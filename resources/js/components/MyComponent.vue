<template>
    <div class="container">
        <p>{{ msg }}</p>
        <hr>
        <input type="text" v-model="name">
        <button v-on:click="doAction">click</button>
    </div>
</template>

<script>
export default {
    data:function() {
        return {
            msg: 'Please input your name.',
            name: '',
        };
    },
    methods:{
        doAction:function(){
            this.msg = 'Hello, ' + this.name + '.';
        }
    }
}
</script>