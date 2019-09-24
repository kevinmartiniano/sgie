<template>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="instituicao in instituicoes" :key="instituicao.id">
                    <th scope="row">
                        {{ instituicao.id }}
                    </th>
                    <td>
                        <a :href="'/instituicoes/' + instituicao.id">
                            {{ instituicao.nome }}
                        </a>
                    </td>
                    <td>
                        {{ instituicao.cnpj }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" :data-target="'#editModal-' + instituicao.id">Editar</button>
                    </td>

                    <div class="modal fade" :id="'editModal-' + instituicao.id" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" :id="'editModalLabel-' + instituicao.id">Editar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <input :id="'id-' + instituicao.id" type="hidden" :value="instituicao.id" />
                                        <input :id="'status-' + instituicao.id" type="hidden" :value="instituicao.id" />
                                        <div class="form-group">
                                            <label :for="'nome-' + instituicao.id" class="col-form-label">Nome:</label>
                                            <input type="text" class="form-control" :id="'nome-' + instituicao.id" :value="instituicao.nome">
                                        </div>
                                        <div class="form-group">
                                            <label :for="'estado-' + instituicao.id" class="col-form-label">CNPJ:</label>
                                            <input class="form-control" :id="'cnpj-' + instituicao.id" :value="instituicao.cnpj"></input>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel" name="cancel">Cancelar</button>
                                    <button type="button" class="btn btn-primary" v-on:click="editInstituicao(instituicao.id)" id="submit" name="submit">Salvar</button>
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
            //
		};
	},

	props: [
		'instituicoes',
	],

	ready() {
		//
	},

	mounted() {
		//
	},

    methods: {
        editInstituicao(id) {
            var instituicao = {
                nome: this.getNome(id),
                cnpj: this.getCnpj(id),
                status: this.getStatus(id),
            };

            this.requestApi('put', '/api/v1/instituicoes/' + id, instituicao, 'refreshPage', {});
        },

        getId(id) {
            return $('input[id="id-' + id + '"]').val();
        },

        getNome(id) {
            return $('input[id="nome-' + id + '"]').val();
        },

        getCnpj(id) {
            return $('input[id="cnpj-' + id + '"]').val();
        },

        getStatus(id) {
            return $('input[id="status-' + id + '"]').val();
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
