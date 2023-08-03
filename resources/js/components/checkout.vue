<template>
    <div>
        <button class="btn btn-danger" @click="checkout">Checkout</button>
    </div>
</template>

<script>
    export default {
        props: ['userId'],

        methods: {
            checkout() {
                axios.get('/checkout')
                    .then(response => {
                        alert(response.data.message);

                        if(response.data.code == 1){
                            window.location = '/home';
                        }else if(response.data.code == 2){
                            window.location = '/profile/'+ this.userId +'/edit';
                        }else{
                            window.location = '/orderList';
                        }
                    });
            }
        }
    }
</script>
