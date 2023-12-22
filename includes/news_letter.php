        <section class="mt-100">
            <div class="pxp-container">
                <h2 class="pxp-section-h2 text-center">Stay Up to Date</h2>
                <p class="pxp-text-light text-center">Subscribe to our newsletter to receive our weekly feed.</p>

                <div class="row mt-4 mt-md-5 justify-content-center">
                    <div class="col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                        <div class="pxp-subscribe-1-container pxp-animate-in pxp-animate-in-top">
                            <div class="pxp-subscribe-1-image">
                                <img src="images/subscribe.png" alt="Stay Up to Date">
                            </div>
                            <div class="pxp-subscribe-1-form">
                                <form method="POST" action="includes/subscribers-action">
                                    <input type="text" id="ipAddress" name="ipAddress" readonly hidden>
                                    <input type="text" id="country" name="country" readonly hidden>
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Enter your email..." required name="email">
                                        <input type="submit" name="form" class="btn btn-primary" value="Subscribe ">
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



  <script>
    window.addEventListener('load', function () {
      // Get user's location based on IP address using ipinfo.io API
      fetch('https://ipinfo.io?token=885c0059793c07')
        .then(response => response.json())
        .then(data => {
          // Populate form fields with location information
          document.getElementById('ipAddress').value = data.ip || 'N/A';
          document.getElementById('country').value = data.country || 'N/A';
        })
        .catch(error => console.error('Error fetching location:', error));
    });
  </script>




