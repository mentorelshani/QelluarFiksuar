<script>
    import Vue from 'vue';
    import VueRouter from 'vue-router';


    import HeaderComponent from '../components/includes/HeaderComponent.vue'

    import TextEditor from './helpers/TextEditor.vue'

    Vue.component('HeaderComponent',HeaderComponent);
    export default {

    }


    new Vue({
        el: '#admin',

    })

</script>



<template>
	<div>
		<header-component></header-component>
		<div class="container">
    		<div class="starter-template">
                <router-view></router-view>
            </div>
        </div>
	</div>
</template>