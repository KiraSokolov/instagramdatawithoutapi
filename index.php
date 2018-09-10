<?php
echo '<h1 align="center"> Instagram Post #kaboo2018</h1><div style="text-align:center">';
$baseUrl = 'https://www.instagram.com/explore/tags/kaboo2018/?__a=1';
$url = $baseUrl;

for($i=1;$i<5;$i++)
{
    $json = json_decode(file_get_contents($url));
   
    foreach($json->graphql->hashtag->edge_hashtag_to_media->edges as $row)
    {
        echo '<img src="'.$row->node->display_url.'" width="250" height="250">';
    }
    if(!$json->graphql->hashtag->edge_hashtag_to_media->page_info->has_next_page) break;
    $url = $baseUrl.'&max_id='.$json->graphql->hashtag->edge_hashtag_to_media->page_info->end_cursor;
}
echo '</div>';
?>