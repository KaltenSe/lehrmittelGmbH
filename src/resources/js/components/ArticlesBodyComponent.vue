<template>
    <div class="media m-2">
        <img class="d-flex mr-3 hide" src="#">
        <div class="media-body">
            <h5 class="mt-0 mb-2 font-weight-bold"> {{Name}} <small><i> {{Preis}} €</i></small></h5>
            <p>{{Beschreibung}}</p>
            <a @click="redirect" class="btn btn-light"> Details </a>
            <a href="" class="btn btn-light">
                <i class="fas fa-shopping-cart"></i>
            </a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ArticlesBodyComponent",

        props: [
            'Id',
            'Name',
            'Preis',
            'Beschreibung'
        ],
    }
</script>

<style scoped>

</style>
