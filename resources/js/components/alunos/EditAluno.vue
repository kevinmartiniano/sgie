<template>
    <div>
        <div class="row">
            <div class="col col-lg-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Editar</button>
            </div>

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input id="id" type="hidden" :value="aluno.id" />
                            <input id="id_curso" type="hidden" :value="curso.id" />
                            <div class="form-group">
                                <label for="nome" class="col-form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" :value="aluno.nome">
                            </div>
                            <div class="form-group">
                                <label for="celular" class="col-form-label">Celular:</label>
                                <input class="form-control" id="celular" :value="aluno.celular"></input>
                            </div>
                            <div class="form-group">
                                <label for="endereco" class="col-form-label">Endereço:</label>
                                <input class="form-control" id="endereco" :value="aluno.endereco"></input>
                            </div>
                            <div class="form-group">
                                <label for="numero" class="col-form-label">Número:</label>
                                <input class="form-control" id="numero" :value="aluno.numero"></input>
                            </div>
                            <div class="form-group">
                                <label for="bairro" class="col-form-label">Bairro:</label>
                                <input class="form-control" id="bairro" :value="aluno.bairro"></input>
                            </div>
                            <div class="form-group">
                                <label for="cidade" class="col-form-label">Cidade:</label>
                                <input class="form-control" id="cidade" :value="aluno.cidade"></input>
                            </div>
                            <div class="form-group">
                                <label for="estado" class="col-form-label">Estado:</label>
                                <input class="form-control" id="estado" :value="aluno.uf"></input>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel" name="cancel">Cancelar</button>
                        <button type="button" class="btn btn-primary" v-on:click="editAluno()" id="submit" name="submit">Salvar</button>
                    </div>
                    </div>
                </div>
            </div>

            <div class="col"></div>
            <div class="col col-lg-3"></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col col-lg-3">
                Nome:
            </div>
            <div class="col">
                {{ aluno.nome }}
            </div>
            <div class="col col-lg-3">
                CPF:
            </div>
            <div class="col">
                {{ aluno.cpf }}
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-3">
                Data de Nascimento:
            </div>
            <div class="col">
                {{ aluno.data_de_nascimento }}
            </div>
            <div class="col col-lg-3">
                Email:
            </div>
            <div class="col">
                {{ aluno.email }}
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-3">
                Celular:
            </div>
            <div class="col">
                {{ aluno.celular }}
            </div>
            <div class="col col-lg-3">
                Endereço:
            </div>
            <div class="col">
                {{ aluno.endereco }}
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-3">
                Número:
            </div>
            <div class="col">
                {{ aluno.numero }}
            </div>
            <div class="col col-lg-3">
                Bairro:
            </div>
            <div class="col">
                {{ aluno.bairro }}
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-3">
                Cidade:
            </div>
            <div class="col">
                {{ aluno.cidade }}
            </div>
            <div class="col col-lg-3">
                UF:
            </div>
            <div class="col">
                {{ aluno.uf }}
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-3">
                Status:
            </div>
            <div class="col">
                {{ aluno.status }}
            </div>
            <div class="col col-lg-3">
                Curso:
            </div>
            <div class="col">
                <a :href="'/cursos/' + curso.id">
                    {{ curso.nome }}
                </a>
            </div>
        </div>
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
		'aluno',
        'curso',
	],

	ready() {
		//
	},

	mounted() {
		//
	},

    methods: {
        editAluno() {
            var aluno = {
                nome: this.getNome(),
                celular: this.getCelular(),
                endereco: this.getEndereco(),
                numero: this.getNumero(),
                bairro: this.getBairro(),
                cidade: this.getCidade(),
                uf: this.getEstado(),
                id_curso: this.getIdCurso(),
            };

            this.requestApi('put', '/api/v1/alunos/' + this.getId(), aluno, 'refreshPage', {});
        },

        getId() {
            return $('input[id="id"]').val();
        },

        getIdCurso() {
            return $('input[id="id_curso"]').val();
        },

        getNome() {
            return $('input[id="nome"]').val();
        },

        getCelular() {
            return $('input[id="celular"]').val();
        },

        getEndereco() {
            return $('input[id="endereco"]').val();
        },

        getNumero() {
            return $('input[id="numero"]').val();
        },

        getBairro() {
            return $('input[id="bairro"]').val();
        },

        getCidade() {
            return $('input[id="cidade"]').val();
        },

        getEstado() {
            return $('input[id="estado"]').val();
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
