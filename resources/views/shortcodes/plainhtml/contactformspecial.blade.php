<div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
           <form class="my-form" enctype="multipart/form-data" method="POST" onSubmit="your_ajax_function(); return false;">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="text1547009506085" id="text1547009506085" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="text1547009507933" id="text1547009507933" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="text1547009511316" id="text1547009511316" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="textarea1547009512316" id="textarea1547009512316" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    
                        <div class="form-group">
                            <input type="button" name="btnSubmit" class="btnContact" value="Send Message" />
                        </div>
                    </div>

                    
                </div>

 <input type="hidden" id="ttoken" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" name="table_name" class="table_name" id="c50734c08" value="c50734c08" />
<input type="hidden" name="files" class="files" value="" />
            </form>
</div>