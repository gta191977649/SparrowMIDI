<template>
    <div>
        <p v-if="!recents_midis">无数据</p>
        <ul v-for="midi in recents_midis">
            <li><a :href="'/midi/'+midi.id" >{{midi.title}} - {{midi.singer}}</a></li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('RecentMIDI mounted.')
        },
        data(){
            return {
                recents_midis: []
            }
        },
        created(){
            axios.get('/api/midis/recent')
            .then(response => {
                this.recents_midis = response.data
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
</script>
