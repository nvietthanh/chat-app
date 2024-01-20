<template>
    <div>
        <ckeditor 
            v-model="editorData" 
            :config="editorConfig"
            :editor="editor"
            @change="emitData"
        />
    </div>
</template>

<script>
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
    components: {
        ckeditor: CKEditor.component,
        ClassicEditor
    },
    props: {
      contentProp: {
        type: String,
        required: false
      }
    },
    data() {
        return {
            errors:{
                name: ''
            },
            editor: ClassicEditor,
            editorData: this.contentProp ?? '',
            editorConfig: {
                toolbar: {
                    items: [
                        'bold',
                        'italic',
                        // 'link',
                        'undo',
                        'redo'
                    ]
                }
            }
        };
    },
    watch: {
        editorData(value) {
            this.emitData()
        },
    },
    methods: {
        getContent(value) {
            this.editorData = value
        },
        emitData() {
            this.$emit('updateContent', this.editorData)
        },
    },
}
</script>

<style>
.ck-sticky-panel__content {
    border-bottom: 1px solid #ccced1 !important;
}
.ck-editor__editable_inline {
    min-height: 350px;
}
.ck-editor__main {
    max-height: 350px;
    overflow-y: scroll;
    /* border-bottom: 1px solid #000 */
}
</style>