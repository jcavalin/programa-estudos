<template>
    <div>
        <h4>Incluir novo programa de estudos</h4>
        <div>
            <validation-observer ref="observer" v-slot="{ handleSubmit }">
                <b-form @submit.stop.prevent="handleSubmit(submit)">
                    <validation-provider
                            name="Banca"
                            :rules="{ required: true }"
                            v-slot="validation"
                    >
                        <b-form-group id="input-group-banca" label="Banca">
                            <b-form-select
                                    id="banca"
                                    v-model="form.banca_id"
                                    :options="bancas"
                                    :state="getValidationState(validation)"
                                    aria-describedby="input-banca-error"
                            ></b-form-select>
                            <b-form-invalid-feedback id="input-banca-error">
                                {{ validation.errors[0] }}
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </validation-provider>

                    <validation-provider
                            name="Órgão"
                            :rules="{ required: true }"
                            v-slot="validation"
                    >
                        <b-form-group id="input-group-orgao" label="Órgão">
                            <b-form-select
                                    id="orgao"
                                    v-model="form.orgao_id"
                                    :options="orgaos"
                                    :state="getValidationState(validation)"
                                    aria-describedby="input-orgao-error"
                            ></b-form-select>
                            <b-form-invalid-feedback id="input-orgao-error">
                                {{ validation.errors[0] }}
                            </b-form-invalid-feedback>
                        </b-form-group>
                    </validation-provider>

                    <b-row>
                        <b-col md="12" class="form-button-container">
                            <b-button to='/'>
                                <b-icon-arrow-left></b-icon-arrow-left>
                                Voltar
                            </b-button>
                            <b-button type="submit" variant="success">
                                <b-icon-check></b-icon-check>
                                Salvar
                            </b-button>
                        </b-col>
                    </b-row>
                </b-form>
            </validation-observer>
        </div>
    </div>
</template>

<script>
    import Orgao from "../../services/orgao";
    import Banca from "../../services/banca";
    import ProgramaEstudos from "../../services/programaEstudos";

    export default {
        data() {
            return {
                orgaos: [],
                bancas: [],
                form: {
                    orgao_id: null,
                    banca_id: null,
                }
            }
        },
        methods: {
            getValidationState({dirty, validated, valid = null}) {
                return dirty || validated ? valid : null;
            },
            submit() {
                let {orgao_id, banca_id} = this.form;

                ProgramaEstudos.insert({orgao_id, banca_id}).then(response => {
                    let {id} = response.data;
                    this.$router.push({path: `/programa-estudos/${id}/view`})
                });
            },
            carregarCombos() {
                let formatarCombo = ({nome: text, id: value}) => ({text, value});

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
