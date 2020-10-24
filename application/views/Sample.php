<section class="page-section portfolio" id="portfolio">

<div class="container">
        <div class="row">
          <span class="fileUp"></span>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="directory_main_view">
              <div class="directory_folder_path">
                <span class="directory_folder_path_icon">
                  <i class="fa fa-eye"></i> 
                </span>
                <span class="directory_folder_path_text" id="directory_folder_path_text"><?php echo $selectedDirectoryPath; ?></span>
                <!-- <span class=""> -->
                  <!-- <button type="button" class="upload_btn upload_btn_btn" ><i class="fa fa-upload"></i></button> -->
                <!-- </span> -->
                <span class="search_box">
                  <input type="text" class="search_file" placeholder="search files here">
                </span>
              </div>
              <?php foreach ($fileList as $file) {  ?>
                <div class='directory_file_item'> <?php echo $file['file_name']; ?> <span class="text-red trash_btn" title="Delete file" data-id="<?php echo $file['file_id']; ?>" data-name="<?php echo $file['file_name']; ?>" ><i class="fa fa-trash "></i></span></div>
              <?php }  ?>
          <div>
        </div>
    </div>

    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Deleted Files</h2>
        <div class="divider-custom">
        </div>
        <div class="row">
            <div class="directory_main_view">
              <div class="directory_folder_path">
                <span class="directory_folder_path_icon">
                  <i class="fa fa-eye"></i> 
                </span>
                <span class="directory_folder_path_text"><?php echo $selectedDirectoryPath; ?></span>
              </div>
              <?php if(count($historyFileList) !== 0){ foreach ($historyFileList as $file) { ?>
                <div class='directory_file_item'> <?php echo $file; ?> </div>
              <?php } }else{ ?>
                <span class="empty_folder">No files where deleted </span>
              <?php  } ?>
          <div>
        </div>
    </div>

</section>

<?php
$this->load->view('sample_js');
?>