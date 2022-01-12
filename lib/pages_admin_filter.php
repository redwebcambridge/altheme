<?php
if ($_GET['page'] == 'academy_pages') {
    echo '<h1 class="wp-heading-inline">Academy Pages</h1>';
}
if ($_GET['page'] == 'sports_pages') {
    echo '<h1 class="wp-heading-inline">Sport Pages</h1>';
}
if ($_GET['page'] == 'adult_pages') {
    echo '<h1 class="wp-heading-inline">Adult Education Pages</h1>';
}
class BXFT_Table extends WP_List_Table {

/**
 * Define our bulk actions
 * 
 * @since 1.2
 * @returns array() $actions Bulk actions
 */
function get_bulk_actions() {
    $actions = array(
        'delete' => __( 'Delete' , 'visual-form-builder'),
    );
    return $actions;
}

/**
 * Process our bulk actions
 * 
 * @since 1.2
 */
function process_bulk_action() {        
    $entry_id = ( is_array( $_REQUEST['entry'] ) ) ? $_REQUEST['entry'] : array( $_REQUEST['entry'] );
    if ( 'delete' === $this->current_action() ) {
        global $wpdb;
        foreach ( $entry_id as $id ) {
            $id = absint( $id );
            $wpdb->query( "DELETE FROM $this->entries_table_name WHERE entries_id = $id" );
        }
    }
}
 // Displaying checkboxes!
 function column_cb($item) {
    return sprintf(
        '<input type="checkbox" name="%1$s" id="%2$s" value="checked" />',
        //$this->_args['singular'],
        $item['Stylesheet'] . '_status',
        $item['Stylesheet'] . '_status'
    );
}
public function prepare_items() {
    $data         = $this->wp_list_table_data();
    $per_page     = 20;
    $current_page = $this->get_pagenum();
    $total_items  = count( $data );
    $this->set_pagination_args(
        array(
            'total_items' => $total_items,
            'per_page'    => $per_page,
        )
    );
    $this->items           = array_slice(
        $data,
        ( ( $current_page - 1 ) * $per_page ),
        $per_page
    );
    $this->process_bulk_action();
    //$this->search_box('Search', 'search');
    $columns = $this->get_columns();
    $hidden = $this->get_hidden_columns();
    $sortable = $this->get_sortable_columns();
    $this->_column_headers = array( $columns, $hidden, $sortable );
}


public function wp_list_table_data() {
    $args = array(  
        'post_type' => 'page',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );
    $pages = new WP_Query($args);
    $page_data = array();
    while ( $pages->have_posts() ) : $pages->the_post(); 
        //Academy Pages
        if ($_GET['page'] == 'academy_pages') {
            if(is_sports_page()){continue;}
            if(is_adult_ed_page()){continue;}
            $single_data = array(
                'id'    => get_the_id(),
                'title'  => '<strong><a href="'.get_edit_post_link().'">'.get_the_title().'</a></strong>',
                'author' => get_the_author(),
                'date' => get_post_status().'<br>'.get_the_date(),
            );
        }
        //Sports Pages
        if ($_GET['page'] == 'sports_pages') {
            if(!is_sports_page()){continue;}
            $single_data = array(
                'id'    => get_the_id(),
                'title'  => '<strong><a href="'.get_edit_post_link().'">'.get_the_title().'</a></strong>',
                'author' => get_the_author(),
                'date' => get_post_status().'<br>'.get_the_date(),
            );
        }
        //Adult Ed Pages
        if ($_GET['page'] == 'adult_pages') {
            if(!is_adult_ed_page()){continue;}
            $single_data = array(
                'id'    => get_the_id(),
                'title'  => '<strong><a href="'.get_edit_post_link().'">'.get_the_title().'</a></strong>',
                'author' => get_the_author(),
                'date' => get_post_status().'<br>'.get_the_date(),
            );
        }
        array_push($page_data,$single_data);
    endwhile;
    //Add homepages for Adult ed and sports
    if ($_GET['page'] == 'adult_pages') {
        $adult_home = get_field('adult_learning_homepage','option');
        $single_data = array(
            'id'    => $adult_home,
            'title'  => '<strong><a href="'.get_edit_post_link($adult_home).'">'.get_the_title($adult_home).'</a> <em> - Homepage</em></strong>',
            'author' => get_the_author($adult_home),
            'date' => get_post_status($adult_home).'<br>'.get_the_date($adult_home),
        );
        array_push($page_data,$single_data);
    }
    if ($_GET['page'] == 'sports_pages') {
        $sports_home = get_field('sports_homepage','option');
        $single_data = array(
            'id'    => $sports_home,
            'title'  => '<strong><a href="'.get_edit_post_link($sports_home).'">'.get_the_title($sports_home).'</a> <em> - Homepage</em></strong>',
            'author' => get_the_author($sports_home),
            'date' => get_post_status($sports_home).'<br>'.get_the_date($sports_home),
        );
        array_push($page_data,$single_data);
    }

    return $page_data;
}

public function get_hidden_columns() {
    return array( 'id' );
}

public function get_columns() {
    return array(
        'cb' => '<input type="checkbox" />',
        'id'     => 'ID',
        'title'   => 'Title',
        'author'  => 'Author',
        'date'  => 'Date',
    );
}

public function column_default( $item, $column_name ) {
    switch ( $column_name ) {
        case 'id':
        case 'title':
        case 'author':
        case 'date':
                return $item[ $column_name ];
        default:
            return 'N/A';
    }
}

public function get_sortable_columns() {
    return array('title' => array('title', true));
}

}

function display_bxft_table() {
$bxft_table = new BXFT_Table();

$bxft_table->prepare_items();
?>
<div class="wrap">
    <?php $bxft_table->display(); ?>
</div>
<?php
}
display_bxft_table();