<template>
    <div id="app">
        <header>
            <b-icon-book-half></b-icon-book-half>
            Programa de Estudos
        </header>

        <div class="page container-fluid">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import 'bootstrap/dist/css/bootstrap.css'
    import 'bootstrap-vue/dist/bootstrap-vue.css'
    import './global.css'

    export default {
        name: 'App'
    }
</script>