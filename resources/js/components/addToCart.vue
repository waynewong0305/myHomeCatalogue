<template>
    <div>
        <button class="btn btn-primary ml-4" @click="addToCart">Add To Cart</button>
    </div>
</template>

<script>
    export default {
        props: ['productId'],

        methods: {
            addToCart() {
                axios.post('/addToCart/' + this.productId)
                    .then(response => {

                        alert(response.data.message);
                        
                        if(response.data.success){
                            window.location = '/shopping-cart';
                        }else{
                            window.location = '/product/' + this.productId;
                        }
                    })
                    .catch(errors => {
                        alert('Please login and try again later.')
                        window.location = '/login';
                    });
            }
        }
    }
</script>
