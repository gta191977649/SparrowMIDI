<template>
  <div>

    <!-- the input field -->
    <input class="form-control" name="keyword" type="text"
           placeholder="搜索MIDI"
           autocomplete="off"
           v-model="query"
           @keydown.down="down"
           @keydown.up="up"
           @keydown.enter="hit"
           @keydown.esc="reset"
           @input="update"/>

    <!-- the list -->
    <ul class="list-group" v-show="hasItems && !keydown">
      <!-- for vue@1.0 use: ($item, item) -->
      <li class="list-group-item p-2" v-for="(item, $item) in items" :class="activeClass($item)" @mousedown="hit" @mousemove="setActive($item)">
        <span v-text="item.title + ' - ' + item.singer"></span>
      </li>
    </ul>
  </div>
</template>

<script>
    import VueTypeahead from 'vue-typeahead'
    import Axios from 'axios'
    Vue.prototype.$http = Axios

    export default {
    extends: VueTypeahead, // vue@1.0.22+
    // mixins: [VueTypeahead], // vue@1.0.21-

    data () {
        return {
            // 你请求查询服务端的Restful API地址 （必填）
            src: '/api/midis/search/',
            // 通过请求发送的数据(可选) - 这个根据你服务端查询API的设计来定就可以了
            data: {},

            // 联想下拉列表中最大有几行(可选)
            limit: 5,

            // 从第几个字符后开始请求API查询（例如3的话当用户输入ABC到C这个时候前端才开始对服务端查询可能的搜索词）
            minChars: 3,

            // 突出显示列表中的第一个项目(可选)
            selectFirst: false,

            queryParamName: '',
            keydown: false,
        }

    },

    methods: {
        // 当用户选中列表中某个元素之后的事件
        // (必要)
        onHit (item) {
            this.query = item.title
            this.keydown = true
        },
        prepareResponseData (data) {
            this.keydown = false
            return data
        }

    }
    }
</script>
<style>

</style>