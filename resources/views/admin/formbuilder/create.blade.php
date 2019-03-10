@extends('admin.layouts.keditorheader')


@section('content')
<div class="page-header">
        <h2>Create Widget Form </h2>
            <hr>

      </div>

<a href="{{route('admin.forms.index')}}" class="btn btn-primary btn-sm align-self-center"><b>Back</b></a>

   <a href="#" onClick="SaveContent('{{route('admin.forms.fsave')}}')" class="btn btn-primary btn-sm align-self-center"><b>Save</b></a>
   <meta name="csrf-token" content="{{ csrf_token() }}">

 <br><br>
    <div class="form-group">
                <label for="tag">Form Name :</label>
                <input type="text" name="formname" id="formname" placeholder="Enter Form Name" class="form-control">
            </div>
<br>
<p> Delete Dummy Container and components and Drag and Drop the Container and then place Components of your wish inside it.</p>
<br>
<div id="testcreate">
   
   <div id="content-area">
        
        
      <div data-type="container-content">
                 
            
          
        
            <div id="banner">
              
                
                   
             <section>
                 <div data-type="container-content">
                 <section data-type="component-photo">
                    <div class="photo-panel">
                         <img src="{{asset('examples/snippets/img/somewhere_bangladesh.jpg')}}" style="display: inline-block;" height="" width="100%">
                     </div>
                    </section>
                  </div>
               </section>
                            
                       
                   
                
            </div>
            
        </div>

      </div>
    
  </div>   
@endsection
@section('scripts')

 <script type="text/javascript" data-keditor="script">
          $(function () {
           
                $('#content-area').keditor({
                  
                    containerSettingEnabled: true,
                     snippetsUrl: "{{route('admin.forms.snippets')}}",
                    contentAreasSelector: '#banner',
                    containerSettingInitFunction: function (form, keditor) {
                        // Add control for settings form
                        form.append(
                            '<div class="form-horizontal">' +
                            '   <div class="form-group">' +
                            '       <div class="col-sm-12">' +
                            '           <label>Background color</label>' +
                            '           <input type="text" class="form-control txt-bg-color" />' +
                            '       </div>' +
                            '   </div>' +
                            '   <div class="form-group">' +
                            '       <div class="col-sm-12">' +
                            '           <label>Margin</label>' +
                            '           <input type="text" class="form-control txt-margin" />' +
                            '       </div>' +
                            '   </div>' +
                            '<div class="form-group">' +
                            '       <div class="col-sm-12">' +
                            '           <label>Image Padding</label>' +
                            '           <input type="text" class="form-control txt-ipadd" />' +
                            '       </div>' +
                            '   </div>' +
                            '</div>'
                        );
                        
                        // Add event handle for background color textbox
                        form.find('.txt-bg-color').on('change', function () {
                            // Get current setting container
                            var container = keditor.getSettingContainer();
                            // Find '.row' for setting background color
                            // Note: Make sure you have a div for setting background color
                            var row = container.find('.row');
                            var cc = container.find('.keditor-container-content');
                            // Set background color with value of textbox
                            row.css('background-color', this.value);
                            
                        });
                        form.find('.txt-margin').on('change', function () {
                            // Get current setting container
                            var container = keditor.getSettingContainer();
                            // Find '.row' for setting background color
                            // Note: Make sure you have a div for setting background color
                            var row = container.find('.row');
                            
                            // Set background color with value of textbox
                            row.css('background-color', this.value);
                            row.css('margin', this.value);
                            
                        });
                        form.find('.txt-ipadd').on('change', function () {
                            // Get current setting container
                            var container = keditor.getSettingContainer();
                            // Find '.row' for setting background color
                            // Note: Make sure you have a div for setting background color
                            
                            var cc = container.find('.keditor-container-content');
                            // Set background color with value of textbox
                            
                            
                            cc.css('padding', this.value);
                        });
                    },
                    containerSettingShowFunction: function (form, container, keditor) {
                        // Find '.row' div
                        // Note: Make sure you have a div for setting background color
                        var row = container.find('.row');
                        // User "prop()" method to get properties of HTML element
                        var backgroundColor = row.prop('style').backgroundColor || '';
                        var margin = row.prop('style').margin || '';
                        // User 'backgroundColor' for value of background color textbox
                        form.find('.txt-bg-color').val(backgroundColor);
                        form.find('.txt-margin').val(margin);
                        form.find('.txt-ipadd').val(margin);
                    },
                    containerSettingHideFunction: function (form, keditor) {
                        // Clean value of background color textbox when hiding settings form
                        form.find('.txt-bg-color').val('');
                        form.find('.txt-margin').val('');
                        form.find('.txt-ipadd').val('');
                    }
                });
            });

       function SaveContent(newLocation)
        {
            
            var fileContent = $('#testcreate').html();
            var formname = $('#formname').val();
            //var data = "_token="+$('meta[name="csrf-token"]').attr('content')+"&formname='test'&htmlcontent="+fileContent;
           

             var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                formname:String(formname),
                htmlcontent:String(fileContent)
            });

            $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: newLocation,
           
            type: 'post',
            data:  data,
            
            beforeSend: function(){
            console.log( data );
            },
            success: function(result) {
            if(result == "success"){
                var newLocation = "{{ url('/admin/forms') }}";
              window.location.href= newLocation;
            }
           
            //alert(result);
            //window.location.href= url('/');
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.'+errorThrown);
                  }
              }
            });
            
        
        }
        </script>
        <script type="text/javascript" data-keditor="script">
        /**!
 * Configuration:
 * @option {Boolean} niceScrollEnabled Enable niceScroll or not
 * @option {Boolean} nestedContainerEnabled Enable nested container or not
 * @option {String} btnMoveContainerText Text content for move button of container
 * @option {String} btnMoveComponentText Text content for move button of component
 * @option {String} btnSettingContainerText Text content for setting button of container
 * @option {String} btnSettingComponentText Text content for setting button of component
 * @option {String} btnDuplicateContainerText Text content for duplicate button of container
 * @option {String} btnDuplicateComponentText Text content for duplicate button of component
 * @option {String} btnDeleteContainerText Text content for delete button of container
 * @option {String} btnDeleteComponentText Text content for delete button of component
 * @option {String} tabContainersText Text for Containers tab
 * @option {String} tabContainersTitle Title for Containers tab
 * @option {String} tabComponentsText Text for Components tab
 * @option {String} tabComponentsTitle Title for Components tab
 * @option {Boolean} tabTooltipEnabled Bootstrap Tooltip is enabled for Component and Container tab or not
 * @option {Object} extraTabs Extra tabs besides Containers and Components tabs in sidebar
 * Example: {
 *     tabName: {
 *         text: 'My Extra Tab #1',
 *         title: 'My Extra Tab #1',
 *         content: 'Here is content of My Extra Tab #1'
 *     }
 * }
 * @option {String|Function} defaultComponentType Default component type of component. If type of component does not exist in KEditor.components, will be used 'defaultComponentType' as type of this component. If is function, argument is component
 * @option {String|jQuery} sidebarContainer The place which sidebar will be appended to. If it's blank, will be appended to body 
 * @option {String} snippetsUrl Url to snippets file
 * @option {Boolean} snippetsTooltipEnabled Bootstrap tooltip is enable for snippet or not
 * @option {String} snippetsTooltipPosition Position of Bootstrap tooltip for snippet. Can be 'left', 'right', 'top' and 'bottom'
 * @option {Boolean} snippetsFilterEnabled Enable filtering snippets by categories and text searching or not
 * @option {String} snippetsCategoriesSeparator The separator character between each categories
 * @option {Boolean} iframeMode KEditor is created inside an iframe or not. KEditor is created inside an iframe or not. Keditor will add all elements which have 'data-type=keditor-style' for iframe stylesheet. These elements can be 'link', 'style' or any tags. If these elements have 'href' attribute, will create link tag with href. If these elements do not have 'href' attribute, will create style tag with css rule is html code inside element
 * @option {Array<Object>} contentStyles Content styles for iframe mode
 * Example: [
 *     {
 *         href: '/path/to/style/file'
 *     }, {
 *         content: 'a { color: red; }'
 *     }
 * ]
 * @option {String} contentAreasSelector Selector of content areas. If is null or selector does not match any elements, will create default content area and wrap all content inside it.
 * @option {String} contentAreasWrapper The wrapper element for all contents inside iframe or new div which will contains content of textarea. It's just for displaying purpose. If you want all contents inside iframe are appended into body tag, just leave it as blank
 * @option {Boolean} containerSettingEnabled Enable setting panel for container
 * @option {Function} containerSettingInitFunction Method will be called when initializing setting panel for container
 * @option {Function} containerSettingShowFunction Method will be called when setting panel for container is showed
 * @option {Function} containerSettingHideFunction Method will be called when setting panel for container is hidden
 * @option {Function} onReady Callback will be called after keditor instance is ready
 * @option {Function} onInitFrame Callback will be called after iframe and content areas wrapper inside it are created. Arguments: frame, frameHead, frameBody
 * @option {Function} onSidebarToggled Callback will be called after toggled sidebar. Arguments: isOpened
 * @option {Function} onContentChanged Callback will be called when content is changed. Includes add, delete, duplicate container or component. Or content of a component is changed. Arguments: event, contentArea
 * @option {Function} onBeforeInitContentArea Callback will be called before initializing container. Arguments: contentArea
 * @option {Function} onInitContentArea Callback will be called when initializing content area. It can return array of jQuery objects which will be initialized as container in content area. By default, all first level sections under content area will be initialized. Arguments: contentArea
 * @option {Function} onBeforeInitContainer Callback will be called before initializing container. Arguments: container, contentArea
 * @option {Function} onInitContainer Callback will be called when initializing container. It can return array of jQuery objects which will be initialized as editable components in container content (NOTE: these objects MUST be under elements which have attribute data-type="container-content"). By default, all first level sections under container content will be initialized. Arguments: container, contentArea
 * @option {Function} onBeforeContainerDeleted Callback will be called before container is deleted. Arguments: event, selectedContainer, contentArea
 * @option {Function} onContainerDeleted Callback will be called after container and its components are already deleted. Arguments: event, selectedContainer, contentArea
 * @option {Function} onContainerChanged Callback will be called when content of container is changed. It can be when container received new component from snippet or from other container. Or content of any components are changed or any components are deleted or duplicated. Arguments: event, changedContainer, contentArea
 * @option {Function} onContainerDuplicated Callback will be called when a container is duplicated. Arguments: event, originalContainer, newContainer, contentArea
 * @option {Function} onContainerSelected Callback will be called when a container is selected. Arguments: event, selectedContainer, contentArea
 * @option {Function} onContainerSnippetDropped Callback will be called when a container snippet is dropped into content area. Arguments: event, newContainer, droppedSnippet, contentArea
 * @option {Function} onComponentReady Callback will be called after component is initialized. This callback is available or not is depend on component type handler.
 * @option {Function} onBeforeInitComponent Callback will be called before initializing component. Arguments: component, contentArea
 * @option {Function} onInitComponent Callback will be called when initializing component. Arguments: component, contentArea
 * @option {Function} onBeforeComponentDeleted Callback will be called before a component is deleted. Arguments: event, selectedComponent, contentArea
 * @option {Function} onComponentDeleted Callback will be called after a component is deleted. Arguments: event, selectedComponent, contentArea
 * @option {Function} onComponentChanged Callback will be called when content of a component is changed. Arguments: event, changedComponent, contentArea
 * @option {Function} onComponentDuplicated Callback will be called when a component is duplicated. Arguments: event, originalComponent, newComponent, contentArea
 * @option {Function} onComponentSelected Callback will be called when a component is selected. Arguments: event, selectedComponent, contentArea
 * @option {Function} onComponentSnippetDropped Callback will be called after a component snippet is dropped into a container. Arguments: event, newComponent, droppedSnippet, contentArea
 * @option {Function} onBeforeDynamicContentLoad Callback will be called before loading dynamic content. Arguments: dynamicElement, component, contentArea
 * @option {Function} onDynamicContentLoaded Callback will be called after dynamic content is loaded. Arguments: dynamicElement, response, status, xhr, contentArea
 * @option {Function} onDynamicContentError Callback will be called if loading dynamic content is error, abort or timeout. Arguments: dynamicElement, response, status, xhr, contentArea
 */
$.keditor.DEFAULTS = {
    niceScrollEnabled: true,
    nestedContainerEnabled: true,
    btnMoveContainerText: '<i class="fa fa-sort"></i>',
    btnMoveComponentText: '<i class="fa fa-arrows"></i>',
    btnSettingContainerText: '<i class="fa fa-cog"></i>',
    btnSettingComponentText: '<i class="fa fa-cog"></i>',
    btnDuplicateContainerText: '<i class="fa fa-files-o"></i>',
    btnDuplicateComponentText: '<i class="fa fa-files-o"></i>',
    btnDeleteContainerText: '<i class="fa fa-times"></i>',
    btnDeleteComponentText: '<i class="fa fa-times"></i>',
    tabContainersText: 'Containers',
    tabContainersTitle: 'Containers',
    tabComponentsText: 'Components',
    tabComponentsTitle: 'Components',
    tabTooltipEnabled: true,
    extraTabs: null,
    defaultComponentType: 'blank',
    sidebarContainer: null,
    snippetsUrl: 'snippets/snippets.html',
    snippetsTooltipEnabled: true,
    snippetsTooltipPosition: 'left',
    snippetsFilterEnabled: true,
    snippetsCategoriesSeparator: ';',
    iframeMode: false,
    contentStyles: [],
    contentAreasSelector: null,
    contentAreasWrapper: '<div class="keditor-ui keditor-content-areas-wrapper"></div>',
    containerSettingEnabled: false,
    containerSettingInitFunction: null,
    containerSettingShowFunction: null,
    containerSettingHideFunction: null,
    onReady: function () {
    },
    onInitFrame: function (frame, frameHead, frameBody) {
    },
    onSidebarToggled: function (isOpened) {
    },
    onInitContentArea: function (contentArea) {
    },
    onContentChanged: function (event, contentArea) {
    },
    onInitContainer: function (container, contentArea) {
    },
    onBeforeContainerDeleted: function (event, selectedContainer, contentArea) {
    },
    onContainerDeleted: function (event, selectedContainer, contentArea) {
    },
    onContainerChanged: function (event, changedContainer, contentArea) {
    },
    onContainerDuplicated: function (event, originalContainer, newContainer, contentArea) {
    },
    onContainerSelected: function (event, selectedContainer, contentArea) {
    },
    onContainerSnippetDropped: function (event, newContainer, droppedSnippet, contentArea) {
    },
    onComponentReady: function (component) {
    },
    onInitComponent: function (component, contentArea) {
    },
    onBeforeComponentDeleted: function (event, selectedComponent, contentArea) {
    },
    onComponentDeleted: function (event, selectedComponent, contentArea) {
    },
    onComponentChanged: function (event, changedComponent, contentArea) {
    },
    onComponentDuplicated: function (event, originalComponent, newComponent, contentArea) {
    },
    onComponentSelected: function (event, selectedComponent, contentArea) {
    },
    onComponentSnippetDropped: function (event, newComponent, droppedSnippet, contentArea) {
    },
    onBeforeDynamicContentLoad: function (dynamicElement, component, contentArea) {
    },
    onDynamicContentLoaded: function (dynamicElement, response, status, xhr, contentArea) {
    },
    onDynamicContentError: function (dynamicElement, response, status, xhr, contentArea) {
    }
};
</script>
@endsection