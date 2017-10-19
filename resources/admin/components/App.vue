<script>
    import Vue from 'vue';
    import VueRouter from 'vue-router';


    import HeaderComponent from '../components/includes/HeaderComponent.vue'

    import TextEditor from './helpers/TextEditor.vue'
    import PageOne from '../components/Page1.vue'

    Vue.component('HeaderComponent',HeaderComponent);
    Vue.component('PageOne',PageOne);

    export default {

        data: function() {
            return {
                  frmChoose:[],

            }
        },

        mounted () {
            this.frmChoose=false;
            console.log(this.$route.path);

            if(this.$route.path=="/dashboard")
            {
                this.frmChoose=true;
            }

        },

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