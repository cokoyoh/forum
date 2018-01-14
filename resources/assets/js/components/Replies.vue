<template>
   <div>
       <div v-for="(reply, index) in items">
           <reply :data = "reply" @deleted="remove(index)"></reply>
       </div>
   </div>
</template>
<script>
    import Reply from './Reply.vue';
    export default {
        props: ['data'],

        data() {
            return {
                items: this.data,
            };
        },
        components: {
            'reply' : Reply
        },

        methods : {
            remove(index)
            {
                this.items.splice(index, 1);

                this.$emit('removed');

                flash('Reply was deleted');
            }
        }
    }

</script>
