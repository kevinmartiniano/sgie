<template>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Email</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="aluno in alunos" :key="aluno.id">
                    <td>
                        <a :href="'/alunos/' + aluno.id">
                            {{ aluno.nome }}
                        </a>
                    </td>
                    <td>
                        {{ aluno.cpf }}
                    </td>
                    <td>
                        {{ aluno.email }}
                    </td>
                    <td>
                        {{ aluno.celular }}
                    </td>
                    <td>
                        {{ aluno.uf }}
                    </td>
                    <td v-if="aluno.status == 1">
                        Ativo
                    </td>
                    <td v-else>
                        Inativo
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    data() {
		return {
            accessToken: '',
			accessTokenId: '',
			clientId: '',
			clientName: '',
			tokens: [],
			create: {},
		};
	},

	props: [
		'alunos',
	],

	ready() {
		//
	},

	mounted() {
		//
	},

    methods: {
        callFunction(exec, resp, args) {
            if(exec = 'refreshPage') {
                location.reload();
            }
        },

        requestApi(method, uri, form, exec, args) {
			this.getClients(method, uri, form, exec, args);
		},

		getClients(method, uri, form, exec, args) {
			axios.get('/oauth/clients').then(response => {
				if(response.data.length == 0) {
					this.createClient(method, uri, form, exec, args);
				} else {
					this.clientId = response.data[0].id;
					this.clientName = response.data[0].name;
					this.setNewToken(method, uri, form, exec, args);
				}
			}).catch(err => {
				if(err.response.status == 401) {
					window.location.href = window.location.origin;
				} else {
					console.error(e);
				}
			});
		},

		createClient(method, uri, form, exec, args) {
			axios.post('/oauth/clients', {
				name: 'user ' + this.user_id,
				redirect: window.location.origin
			}).then(response => {
				this.getClients(method, uri, form, exec, args);
			}).catch (error => {
				console.error(error);
			});
		},

		/*
		 * Creating new personal access token for the user.
		 */
		setNewToken(method, uri, form, exec, args) {
			axios.post('/oauth/personal-access-tokens', {
				name: this.clientName,
				scopes: []
			}).then(response => {
				this.accessToken = response.data.accessToken;
				this.accessTokenId = response.data.token.id;
				this.sendRequest(method, uri, form, exec, args);
			}).catch(error => {
				console.error(error);
			});
		},

		sendRequest(method, uri, form, exec, args) {
			if(method == 'get' || method == 'delete') {
                if(method == 'get') {
                    axios.get(uri, {
                        headers: {
                            'Authorization': "Bearer " + this.accessToken,
                            'Content-Type': "application/json",
                            'Accept': "application/json",
                        }
                    }).then(resp => {
                        this.revoke();
                        this.callFunction(exec, resp, args);
                    }).catch(e => {
                        console.error(e);
                    });
                } else {
                    axios.delete(uri, {
                        headers: {
                            'Authorization': "Bearer " + this.accessToken,
                            'Content-Type': "application/json",
                            'Accept': "application/json",
                        }
                    }).then(resp => {
                        this.revoke();
                        this.callFunction(exec, resp, args);
                    }).catch(e => {
                        console.error(e);
                    });
                }
			} else {
				if(method == 'post') {
                    axios.post(uri, form, {
                        headers: {
                            'Authorization': "Bearer " + this.accessToken,
                            'Content-Type': "application/json",
                            'Accept': "application/json",
                        }
                    }).then(resp => {
                        this.revoke();
                        this.callFunction(exec, resp, args);
                    }).catch(e => {
                        console.error(e);
                    });
                } else if(method == 'put') {
                    axios.put(uri, form, {
                        headers: {
                            'Authorization': "Bearer " + this.accessToken,
                            'Content-Type': "application/json",
                            'Accept': "application/json",
                        }
                    }).then(resp => {
                        this.revoke();
                        this.callFunction(exec, resp, args);
                    }).catch(e => {
                        console.log('error');
                        console.log(this.accessToken);
                        console.error(e);
                    });
                } else {
                    console.log('Method not supported');
                }
			}
		},

		/*
		 * Deleting last created token.
		 */
		revoke() {
			axios.delete('/oauth/personal-access-tokens/' + this.accessTokenId).then(resp => {
				this.accessTokenId = '';
				this.accessToken = '';
				this.clientId = '';
				this.clientname = '';
			});
		},
    },
}
</script>
