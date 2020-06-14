<template>
    <div>
        <h4>{{titulo}}</h4>
        <div>
            <validation-observer ref="observer" v-slot="{ handleSubmit }">
                <b-form @submit.stop.prevent="handleSubmit(submitForm)">
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
    export default {
        props: {
            titulo: String,
            orgaos: Array,
            bancas: Array,
            banca_id: String,
            orgao_id: String,
            submit: Function
        },
        watch: {
            banca_id: function (newVal) {
                this.form.banca_id = newVal;
            },
            orgao_id: function (newVal) {
                this.form.orgao_id = newVal;
            },
        },
        data() {
            return {
                form: {
                    orgao_id: null,
                    banca_id: null,
                }
            }
        },
        methods: {
            getValidationState({dirty, validated, valid = null}) {
                return dirty || validated ? valid : null
            },
            submitForm() {
                this.$emit('submit', this.form)
            }
        },
        created() {
            let {orgao_id, banca_id} = this.$props
            this.form.banca_id = banca_id
            this.form.orgao_id = orgao_id
        }
    }
</script>

<style scoped>
</style>
