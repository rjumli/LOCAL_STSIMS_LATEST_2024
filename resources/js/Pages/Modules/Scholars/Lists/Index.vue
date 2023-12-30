<template>
    <Head title="Scholars" />
    <PageHeader :title="title" :items="items" />
     <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <Sidebar :total="total" :ongoing="ongoing" :statistics="statistics" :types="types" :sync_no="sync_no" @info="update()" ref="sync"/>
        </div>
        <div class="file-manager-content w-100 p-4 pb-0" style="height: calc(100vh - 180px); overflow: auto;" ref="box">
            <Lists @info="sync" ref="lists"/>
        </div>
    </div>
</template>
<script>
import Lists from './Lists.vue';
import Sidebar from './Sidebar.vue';
import PageHeader from "@/Shared/Components/PageHeader.vue";
export default {
    props: ['total','ongoing','statistics','types','sync_no'],
    components : { PageHeader, Sidebar, Lists },
    data() {
        return {
            currentUrl: window.location.origin,
            title: "List of Scholars",
            items: [{text: "Scholar",href: "/"},{text: "Lists",active: true}],
        };
    },
    methods : {
        update(){
            this.$refs.lists.fetch();
        },
        sync(){
            this.$refs.sync.updateSync();
        },
        updateSync(data){
            this.$refs.sync.updateUnsync(data);
        }
    }
}
</script>