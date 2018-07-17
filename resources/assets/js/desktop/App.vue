<template>
    <div>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    name: 'App',
    data(){
        return {
            //
        }
    }
}
</script>
<style >
    body {
        margin: 0;
        padding: 0;
        font-family: 'Titillium Web', sans-serif;
    }

    input:focus,
    select:focus,
    textarea:focus,
    button:focus {
        outline: none;
    }
</style>
