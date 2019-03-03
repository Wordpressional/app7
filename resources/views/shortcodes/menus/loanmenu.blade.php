    <nav class="mlthemeone navbar navbar-expand-md navbar-dark  navbar-custom">
        

        
       <div  class="boxlogolnndynamic">
        <span class="editlogolnndynamic">edit</span>
        <span class="savelogolnndynamic">save</span>
        <input type='file' id="imageUploadlogonlnndynamic" accept=".png, .jpg, .jpeg" />
        <label class="imageUploadlogonlnndynamic" for="imageUploadlogonlnndynamic">&nbsp;</label>
        
        <span ><a href="{{url('/')}}"><img id="imagePreviewlogolnndynamic" src="{{asset('themes/t1/logo2.png')}}" alt="Logo"></a></span>
        </div>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                 {{ LoanMenuItems($menuList) }}
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->
   