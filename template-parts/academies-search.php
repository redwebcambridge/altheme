<div class="academies_search mb-md-4 py-4 px-4">
    <div class="row ">
        <div class="col-md-8  search-field">
            <div class="input-group mb-1">
                <input id="academies_search" type="text" class="form-control" placeholder="SEARCH BY SCHOOL NAME" aria-label="School Search" >
                <div class="input-group-append">
                    <button class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div> 
            <p class="px-2"><small>Search by school name or filter by selecting an age group and local authority.</small></p>
        </div>
        <div class="col-md-4 view_buttons d-flex justify-content-end">
            <button id="view_list" class="active search_buttons"><i class="fa-solid fa-table-list"></i> View List</button>
            <button id="view_map" class="search_buttons map_view" ><i class="fa-solid fa-location-dot"></i> View Map</button>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-6 ages my-2">
            <h4 class="mt-1">Ages</h4>
            <?php
                $all_school_age_terms = get_terms(array(
                    'taxonomy' => 'school_age',
                    'hide_empty' => false, 
                ));
            ?>
            <div class="d-flex checkboxes form-group">
                    <div>
                        <button type="button" class="btn btn-primary position-relative filter_button" data-filter-type="age" data-filter-value="allAge" id="allAge">
                            All
                        </button>
                    </div>
                <?php foreach ($all_school_age_terms as $term) : ?>

                    <div>
                        <button type="button" class="btn btn-primary position-relative filter_button deactive" data-filter-type="age" data-filter-value="<?php echo preg_replace('/[^a-zA-Z0-9]+/', '', $term->name); ?>" id="<?php echo preg_replace('/[^a-zA-Z0-9]+/', '', $term->name); ?>">
                            <?php echo $term->name; ?>
                        </button>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-xl-5 col-lg-5 col-md-6 my-2">
            <h4 class="mt-1" >Local Authority</h4>
            <?php
                $all_local_authority_terms = get_terms(array(
                    'taxonomy' => 'local_authority',
                    'hide_empty' => false,
                ));
            ?>
            <div class="d-flex checkboxes">
                    <div>
                        <button type="button" class="btn btn-primary position-relative filter_button" data-filter-type="local" data-filter-value="allLocal" id="allLocal">
                            All
                        </button>
                    </div>
                <?php foreach ($all_local_authority_terms as $authority) : ?>
                    <div>
                        <button type="button" class="btn btn-primary position-relative filter_button deactive" data-filter-type="local" data-filter-value="<?php echo preg_replace('/[^a-zA-Z0-9]+/', '', $authority->name); ?>" id="<?php echo preg_replace('/[^a-zA-Z0-9]+/', '', $authority->name); ?>">
                            <?php echo $authority->name; ?>
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="search-results col-xl-2 col-lg-2 col-12 my-md-2 justify-content-lg-end justify-content-center" style="display:none;">
            <button id="search_results">
                Schools found: 
            </button>
        </div>
    </div>

</div>






