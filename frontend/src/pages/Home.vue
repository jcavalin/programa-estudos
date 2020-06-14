<template>
    <div>
        <h4>Lista de programas de estudos</h4>
        <b-row class="margin-bottom-15">
            <b-col md="12" class="text-right">
                <b-button variant="primary" title="Incluir" size="sm" :to="`/programa-estudos/create`">
                    <b-icon-plus></b-icon-plus>
                    Novo programa de estudos
                </b-button>
            </b-col>
        </b-row>

        <b-table v-if="lista.length > 0" striped hover :items="lista" :fields="fields">
            <template v-slot:cell(acao)="data">
                <b-button-group size="sm">
                    <b-button variant="primary" title="Alterar" :to="`/programa-estudos/${data.item.id}/edit`">
                        <b-icon-pencil></b-icon-pencil>
                    </b-button>
                    <b-button variant="success" title="Visualizar" :to="`/programa-estudos/${data.item.id}/view`">
                        <b-icon-search></b-icon-search>
                    </b-button>
                    <b-button variant="danger" title="Excluir" v-on:click="abrirModal(data.item.id)">
                        <b-icon-trash></b-icon-trash>
                    </b-button>
                </b-button-group>
            </template>
        </b-table>

        <b-row v-else>
            <b-col md="12" class="text-center margin-top-bottom-30">
                <h4>Nenhum programa de estudos encontrado.</h4>
            </b-col>
        </b-row>

        <div>
            <b-modal id="modal-confirm" title="Excluir programa de estudos">
                <b-container>
                    Você tem certeza que deseja excluir este programa de estudos?
                </b-container>
                <template v-slot:modal-footer>
                    <div class="w-100 text-right">
                        <b-button size="sm" v-on:click="fecharModal" class="margin-right-5">
                            Cancelar
                        </b-button>

                        <b-button variant="danger" size="sm" v-on:click="excluir">
                            Sim, excluir!
                        </b-button>
                    </div>
                </template>
            </b-modal>
        </div>
    </div>
</template>

<script>
    import ProgramaEstudos from "../services/programaEstudos"

    export default {
        data() {
            return {
                fields: [
                    {key: 'id', sortable: true, label: 'ID', formatter: value => `#${value}`, class: 'text-center'},
                    {key: 'banca', sortable: true, label: 'Banca'},
                    {key: 'orgao', sortable: true, label: 'Órgão'},
                    {key: 'acao', label: 'Ação', class: 'text-center'},
                ],
                lista: [],
                idExcluir: null
            }
        },
        methods: {
            excluir() {
                this.fecharModal()
                ProgramaEstudos.delete(this.idExcluir).then(() => {
                    this.idExcluir = null
                    this.carregarLista()
                })
            },
            abrirModal(id) {
                this.idExcluir = id
                this.$bvModal.show('modal-confirm')
            },
            fecharModal() {
                this.$bvModal.hide('modal-confirm')
            },
            carregarLista() {
                ProgramaEstudos.list().then(response => this.lista = response.data)
            }
        },
        created() {
            this.carregarLista()
        }
    }
</script>

<style scoped>

</style>