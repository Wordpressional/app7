 <!-- Navbar -->
    <nav class="mlthemeone navbar navbar-expand-md navbar-dark  navbar-custom">
        
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="main.html">Cedo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image page-scroll" href="main.html"><img src="images/logo.svg" alt="logo"></a>
        
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