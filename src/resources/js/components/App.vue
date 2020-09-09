<template>
    <div>
        <h1>App</h1>
        <router-view></router-view>
        <user></user>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log('App Component mounted.')
    }
}
</script>
