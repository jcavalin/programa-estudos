<template>
    <div>
        <ProgramaEstudosForm
                :titulo="`Alterar programa de estudos #${id}`"
                :orgaos="orgaos"
                :bancas="bancas"
                :banca_id="banca_id"
                :orgao_id="orgao_id"
                @submit="submit">
        </ProgramaEstudosForm>
    </div>
</template>

<script>
    import Orgao from "../../services/orgao"
    import Banca from "../../services/banca"
    import ProgramaEstudos from "../../services/programaEstudos"
    import ProgramaEstudosForm from "../../components/ProgramaEstudosForm"

    export default {
        components: {ProgramaEstudosForm},
        data() {
            return {
                id: null,
                orgaos: [],
                bancas: [],
                banca_id: null,
                orgao_id: null,
            }
        },
        methods: {
            getValidationState({dirty, validated, valid = null}) {
                return dirty || validated ? valid : null
            },
            submit(form) {
                let {orgao_id, banca_id} = form

                ProgramaEstudos.update(this.id, {orgao_id, banca_id}).then(() => {
                    this.$router.push({path: `/programa-estudos/${this.id}/view`})
                })
            },
            carregarPrograma() {
                ProgramaEstudos.get(this.id).then(response => {
                    let dados = response.data
                    this.banca_id = dados.banca_id
                    this.orgao_id = dados.orgao_id
                })
            },
            carregarCombos() {
                let formatarCombo = ({nome: text, id: value}) => ({text, value})

                Orgao.list().then(response => this.orgaos = response.data.map(formatarCombo))
                Banca.list().then(response => this.bancas = response.data.map(formatarCombo))
            }
        },
        created() {
            this.id = this.$route.params.id

            this.carregarPrograma()
            this.carregarCombos()
        }
    }
</script>

<style scoped>
</style>
