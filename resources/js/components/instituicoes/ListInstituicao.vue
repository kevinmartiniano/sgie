<template>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CNPJ</th>
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
        //
    },
}
</script>
