<template>
    
    <div>
        <p v-if="!midi_info">无数据</p>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>音轨名称</th>
                    <th>音轨乐器</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(track,index) in midi_info">
                <td>{{index}}</td>
                <td>{{track.TruckName}}</td>
                <td>{{track.ProgramNumber}}</td>
                </tr>
            </tbody>
        </table>
    </div>
        
</template>

<script>
    export default {
        props: ['midi'],
        mounted() {
            console.log('MidiTrack mounted.')
        },
        data(){
            return {
                midi_info: [],
            }
        },
        mounted(){
            axios.get('../api/midis/ins/'+this.midi)
            .then(response => {
                this.midi_info = response.data
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
</script>
