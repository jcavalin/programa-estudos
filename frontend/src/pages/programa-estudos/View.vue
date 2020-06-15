<template>
    <div>
        <h4>Programa de estudos #{{id}}</h4>
        <div>
            <b-row class="margin-bottom-15">
                <b-col md="12">
                    <label>Banca</label>
                    <div class="strong">
                        {{programaEstudos.banca}}
                    </div>
                </b-col>
            </b-row>

            <b-row class="margin-bottom-15">
                <b-col md="12">
                    <label>Órgão</label>
                    <div class="strong">
                        {{programaEstudos.orgao}}
                    </div>
                </b-col>
            </b-row>

            <b-row class="margin-bottom-15">
                <b-col md="12">
                    <b-table v-if="assuntos.length > 0" striped hover :items="assuntos" :fields="fields">
                        <template v-slot:cell(assunto)="data">
                            <span :style="`margin-left: ${calcularMarginArvore(data.item.grupo)}px`">
                                <b-icon-arrow-return-right
                                        v-if="exibirIcone(data.item.grupo)"></b-icon-arrow-return-right>
                                {{data.item.assunto}}
                            </span>
                        </template>
                    </b-table>

                    <b-row v-else>
                        <b-col md="12" class="text-center margin-top-bottom-30">
                            <h4>Nenhum assunto encontrado.</h4>
                        </b-col>
                    </b-row>
                </b-col>
            </b-row>


            <b-row>
                <b-col md="12" class="form-button-container">
                    <b-button to='/'>
                        <b-icon-arrow-left></b-icon-arrow-left>
                        Voltar
                    </b-button>

                    <b-button :to='`/programa-estudos/${id}/edit`' variant="primary">
                        <b-icon-pencil></b-icon-pencil>
                        Alterar
                    </b-button>
                </b-col>
            </b-row>
        </div>
    </div>
</template>

<script>
    import ProgramaEstudos from "../../services/programaEstudos"

    export default {
        data() {
            return {
                id: null,
                programaEstudos: {},
                assuntos: [],
                fields: [
                    {key: 'assunto', label: 'Assunto'},
                    {key: 'questoes', label: 'Questões', class: 'text-right'},
                ]
            }
        },
        methods: {
            carregarPrograma() {
                ProgramaEstudos.get(this.id).then(response => this.programaEstudos = response.data)
            },
            carregarAssuntos() {
                ProgramaEstudos.assuntos(this.id).then(response => this.assuntos = response.data)
            },
            calcularMarginArvore(grupo) {
                return (grupo.length - 3) * 7
            },
            exibirIcone(grupo) {
                return grupo.length > 3
            }
        },
        created() {
            this.id = this.$route.params.id

            this.carregarPrograma()
            this.carregarAssuntos()
        }
    }
</script>

<style scoped>
</style>
