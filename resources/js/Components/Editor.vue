<template>
    <div class="main-container">
        <div class="editor-container editor-container_classic-editor" ref="editorContainerElement">
            <div class="editor-container__editor">
                <div ref="editorElement">
                    <ckeditor  v-if="editor && config" v-model="$store.state.content" :editor="editor" :config="config" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
/**
 * This configuration was generated using the CKEditor 5 Builder. You can modify it anytime using this link:
 * https://ckeditor.com/ckeditor-5/builder/#installation/NoNgNARATAdArDADBSB2VUCcIo8/uAFgGZNio4QBGRQzKdWq1U/EADhQgCcBXFRGGBUwgwSIkBdSAEN2IAEaIAJjIiSgA===
 */

import { computed, ref, onMounted, useTemplateRef } from 'vue';
import { Ckeditor } from '@ckeditor/ckeditor5-vue';

import {
    ClassicEditor,
    Autoformat,
    Autosave,
    BlockQuote,
    Bold,
    Essentials,
    Heading,
    ImageBlock,
    ImageStyle,
    ImageToolbar,
    Indent,
    IndentBlock,
    Italic,
    Link,
    List,
    ListProperties,
    Markdown,
    PageBreak,
    Paragraph,
    PasteFromMarkdownExperimental,
    PasteFromOffice,
    Table,
    TableCaption,
    TableCellProperties,
    TableColumnResize,
    TableProperties,
    TableToolbar,
    TextTransformation,
    TodoList,
    Underline
} from 'ckeditor5';

import translations from 'ckeditor5/translations/ru.js';

import 'ckeditor5/ckeditor5.css';

/**
 * Create a free account with a trial: https://portal.ckeditor.com/checkout?plan=free
 */
const LICENSE_KEY = 'GPL'; // or <YOUR_LICENSE_KEY>.

const editorMenuBar = useTemplateRef('editorMenuBarElement');

const isLayoutReady = ref(false);

const editor = ClassicEditor;

const config = computed(() => {
    if (!isLayoutReady.value) {
        return null;
    }

    return {
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'underline',
                '|',
                'pageBreak',
                'link',
                'insertTable',
                'blockQuote',
                '|',
                'bulletedList',
                'numberedList',
                'todoList',
                'outdent',
                'indent'
            ],
            shouldNotGroupWhenFull: false
        },
        plugins: [
            Autoformat,
            Autosave,
            BlockQuote,
            Bold,
            Essentials,
            Heading,
            ImageBlock,
            ImageStyle,
            ImageToolbar,
            Indent,
            IndentBlock,
            Italic,
            //Link,
            List,
            ListProperties,
            Markdown,
            PageBreak,
            Paragraph,
            PasteFromMarkdownExperimental,
            PasteFromOffice,
            Table,
            TableCaption,
            TableCellProperties,
            TableColumnResize,
            TableProperties,
            TableToolbar,
            TextTransformation,
            TodoList,
            Underline
        ],
        heading: {
            options: [
                {
                    model: 'paragraph',
                    title: 'Paragraph',
                    class: 'ck-heading_paragraph'
                },
                {
                    model: 'heading1',
                    view: 'h1',
                    title: 'Heading 1',
                    class: 'ck-heading_heading1'
                },
                {
                    model: 'heading2',
                    view: 'h2',
                    title: 'Heading 2',
                    class: 'ck-heading_heading2'
                },
                {
                    model: 'heading3',
                    view: 'h3',
                    title: 'Heading 3',
                    class: 'ck-heading_heading3'
                },
                {
                    model: 'heading4',
                    view: 'h4',
                    title: 'Heading 4',
                    class: 'ck-heading_heading4'
                },
                {
                    model: 'heading5',
                    view: 'h5',
                    title: 'Heading 5',
                    class: 'ck-heading_heading5'
                },
                {
                    model: 'heading6',
                    view: 'h6',
                    title: 'Heading 6',
                    class: 'ck-heading_heading6'
                }
            ]
        },
        image: {
            toolbar: ['imageTextAlternative', '|', 'imageStyle:alignBlockLeft', 'imageStyle:block', 'imageStyle:alignBlockRight'],
            styles: {
                options: ['alignBlockLeft', 'block', 'alignBlockRight']
            }
        },
        initialData: '',
        language: 'ru',
        licenseKey: LICENSE_KEY,
        link: {
            addTargetToExternalLinks: true,
            defaultProtocol: 'https://',
            decorators: {
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        menuBar: {
            isVisible: true
        },
        content: '',
        placeholder: 'Type or paste your content here!',
        table: {
            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties', 'tableCellProperties']
        },
        translations: [translations]
    };
});

onMounted(() => {
    isLayoutReady.value = true;
});
</script>

