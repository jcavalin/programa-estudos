<template>
    <div>
        <ProgramaEstudosForm
                titulo="Incluir novo programa de estudos"
                :orgaos="orgaos"
                :bancas="bancas"
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
                orgaos: [],
                bancas: [],
            }
        },
        methods: {
            getValidationState({dirty, validated, valid = null}) {
                return dirty || validated ? valid : null
            },
            submit(form) {
                let {orgao_id, banca_id} = form

                ProgramaEstudos.insert({orgao_id, banca_id}).then(response => {
                    let {id} = response.data
                    this.$router.push({path: `/programa-estudos/${id}/view`})
                })
            },
            carregarCombos() {
                let formatarCombo = ({nome: text, id: value}) => ({text, value})

                Orgao.list().then(response => this.orgaos = response.data.map(formatarCombo))
                Banca.list().then(response => this.bancas = response.data.map(formatarCombo))
            }
        },
        created() {
            this.carregarCombos()
        }
    }
</script>

<style scoped>
</style>
