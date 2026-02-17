<?php include "header.php"; ?>
<!-- End Site Header -->

<!-- Start Nav Backed Header -->
<div class="nav-backed-header parallax">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">Contact</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- End Nav Backed Header -->

<!-- Start Main Content -->
<div class="main-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h1>Contact Us</h1>
        </div>
      </div>
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="wp-block-group is-layout-flow wp-block-group-is-layout-flow">
          <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
            <p><strong>We would love to hear from you! Please fill out the form below and we will get back to you as soon as possible.</strong></p>
            <?php if (get('mail') === 'success'): ?>
              <div class="alert alert-success">Message sent successfully. We will contact you soon.</div>
            <?php elseif (get('mail') === 'failed'): ?>
              <div class="alert alert-danger">Message could not be sent right now. Please try again later.</div>
            <?php elseif (get('mail') === 'invalid'): ?>
              <div class="alert alert-warning">Please fill all required fields with valid details.</div>
            <?php endif; ?>
          </div>
        </div>
        <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
          <form class="ghostkit-form is-layout-flow wp-container-ghostkit-form-is-layout-1 wp-block-form-is-layout-flow" id="gkt_form_fe8826db" method="POST" name="ghostkit-form" action="send_mail.php">
            <div class="ghostkit-form-field ghostkit-form-field-name ghostkit-form-field-name-with-last">
              <label class="ghostkit-form-field-label" for="gkt_form_fe8826db_field_name">Name<span class="required">*</span></label>
              <input type="hidden" name="field_name[label]" value="Name" />
              <div class="ghostkit-form-field-row">
                <div class="ghostkit-form-field-name-first">
                  <input type="text" placeholder="First" required="required" name="field_name[value]" id="gkt_form_fe8826db_field_name" />
                </div>
                <div class="ghostkit-form-field-name-last">
                  <input type="text" placeholder="Last" name="field_name[last]" id="gkt_form_fe8826db_field_name_last" />
                </div>
              </div>
            </div>

            <div class="ghostkit-form-field ghostkit-form-field-email">
              <label class="ghostkit-form-field-label" for="gkt_form_fe8826db_field_email">Email<span class="required">*</span></label>
              <input type="hidden" name="field_email[label]" value="Email" />
              <input type="email" placeholder="example@email.com" required="required" name="field_email[value]" id="gkt_form_fe8826db_field_email" />
            </div>

            <div class="ghostkit-form-field ghostkit-form-field-phone">
              <label class="ghostkit-form-field-label" for="gkt_form_fe8826db_field_phone">Phone</label>
              <input type="hidden" name="field_phone[label]" value="Phone" />
              <input type="tel" placeholder="xxx-xxx-xxxx" name="field_phone[value]" id="gkt_form_fe8826db_field_phone" />
            </div>

            <div class="ghostkit-form-field ghostkit-form-field-textarea">
              <label class="ghostkit-form-field-label" for="gkt_form_fe8826db_field_message">Message<span class="required">*</span></label>
              <input type="hidden" name="field_message[label]" value="Message" />
              <textarea placeholder="Type your message ..." required="required" name="field_message[value]" id="gkt_form_fe8826db_field_message"></textarea>
            </div>

            <div class="ghostkit-form-submit-button">
              <button type="submit" class="ghostkit-button ghostkit-button-md ghostkit-button-with-outline ghostkit-custom-29R04e wp-element-button">
                <span class="ghostkit-button-text">Submit</span>
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- Start Sidebar -->
      <?php include "side-bar.php"; ?>
    </div>
  </div>
</div>
<!-- Start Footer -->
<?php include "footer.php"; ?>

<style>
  /* General Form Styling */
  form.ghostkit-form {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  /* Input Fields */
  form.ghostkit-form input[type="text"],
  form.ghostkit-form input[type="email"],
  form.ghostkit-form input[type="tel"],
  form.ghostkit-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    font-family: Arial, sans-serif;
  }

  /* Input Fields Focus */
  form.ghostkit-form input[type="text"]:focus,
  form.ghostkit-form input[type="email"]:focus,
  form.ghostkit-form input[type="tel"]:focus,
  form.ghostkit-form textarea:focus {
    border-color: #0073e6;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 115, 230, 0.5);
  }

  /* Labels */
  form.ghostkit-form label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
    font-size: 14px;
    color: #333;
  }

  /* Required Asterisk */
  form.ghostkit-form label .required {
    color: #e63946;
  }

  /* Submit Button */
  form.ghostkit-form button {
    background-color: #0073e6;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  /* Submit Button Hover */
  form.ghostkit-form button:hover {
    background-color: #005bb5;
  }

  /* Form Field Row */
  .ghostkit-form-field-row {
    display: flex;
    gap: 10px;
  }

  /* First and Last Name Fields */
  .ghostkit-form-field-name-first,
  .ghostkit-form-field-name-last {
    flex: 1;
  }

  /* Textarea */
  form.ghostkit-form textarea {
    resize: vertical;
    min-height: 100px;
  }
</style>
