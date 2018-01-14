<template>
    <div>
       <div v-if="signedIn">
            <div class = "form-group">
                <textarea name = "body" id = "body"
                          placeholder = "Have something to say?"
                          rows = "5" class = "form-control"
                          required
                        v-model="body">
                </textarea>
            </div>
            <div class = "form-group">
                <button class = "btn btn-default"
                        type = "submit"
                        @click="addReply">Post</button>
            </div>
       </div>

        <p class = "text-center" v-else>Please <a href = "/login"> sign in </a> to participate in this
        discussion</p>
    </div>
</template>
<script>
    export default {
        props: ['endpoint'],
        data() {
            return {
                body: '',
            }
        },

        computed: {
            signedIn()
            {
                return window.App.signedIn;
            }
        },

        methods: {
            addReply()
            {
                console.log('Url - ', this.endpoint );
                axios.post(this.endpoint, {body : this.body})
                    .then(response => {
                       this.body = '';

                       flash("Your reply has been posted");

                       this.$emit('created', response.data);
                    });
            }
        }
    }

</script>
