<template>
    <div class="input-group">
        <input class="form-control border-end-0 border rounded-pill" type="search" value="search" id="search-input" v-model="searchValue">
        <span class="input-group-append">
            <button class="btn btn-outline-secondary bg-white border-bottom-0 border rounded-pill ms-n5" type="button">
                <i class="fa fa-search" @click="search"></i>
            </button>
        </span>
    </div>
    
</template>

<script>
    export default {
        props: [],

        data() {
            return {
                searchValue: ''
            }
        },

        methods: {
            search() {
                if(!this.searchValue){
                    alert('Search bar cannot be empty');
                    window.location.reload();
                }

                axios.post('/searching/' + this.searchValue)
                    .then(response => {
                        console.log(response);
                        alert(response.data.message);
                        
                        if(response.data.code == 0){
                            window.location = '/result/' + this.searchValue;
                        }else{
                            window.location.reload();
                        }
                    });
            }
        }
    }
</script>
