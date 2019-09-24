<template>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Duração (Horas)</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="curso in cursos" :key="curso.id">
                    <td>
                        <a :href="'/cursos/' + curso.id">
                            {{ curso.nome }}
                        </a>
                    </td>
                    <td>
                        {{ curso.duracao }}
                    </td>
                    <td v-if="curso.status == 1">
                        Ativo
                    </td>
                    <td v-else>
                        Inativo
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" :data-target="'#editModal-' + curso.id">Editar</button>
                    </td>

                    <div class="modal fade" :id="'editModal-' + curso.id" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" :id="'editModalLabel-' + curso.id">Editar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <input :id="'id-' + curso.id" type="hidden" :value="curso.id" />
                                        <div class="form-group">
                                            <label :for="'nome-' + curso.id" class="col-form-label">Nome:</label>
                                            <input type="text" class="form-control" :id="'nome-' + curso.id" :value="curso.nome">
                                        </div>
                                        <div class="form-group">
                                            <label :for="'duracao-' + curso.id" class="col-form-label">Duração (Horas):</label>
                                            <input class="form-control" :id="'duracao-' + curso.id" :value="curso.duracao"></input>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel" name="cancel">Cancelar</button>
                                    <button type="button" class="btn btn-primary" v-on:click="editCurso(curso.id)" id="submit" name="submit">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
		'cursos',
	],

	ready() {
		//
	},

	mounted() {
		//
	},

    methods: {
        editCurso(id) {
            var curso = {
                nome: this.getNome(id),
                duracao: this.getDuracao(id),
            };

            this.requestApi('put', '/api/v1/cursos/' + id, curso, 'refreshPage', {});
        },

        getNome(id) {
            return $('input[id="nome-' + id + '"]').val();
        },

        getDuracao(id) {
            return $('input[id="duracao-' + id + '"]').val();
        },

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
