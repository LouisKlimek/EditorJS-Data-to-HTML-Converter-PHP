<?php
class editorJSConverter{
    function jsonToHtml($data)
    {
        // Convert JSON string to JSON Object and get "blocks" child
        $data = json_decode($data)->blocks;
    
        // Loop through every block of JSON
        $ret = '';
        foreach ($data as $item)
        {
    
            // Create HTML for each Block depending on the Block Type
            switch ($item->type)
            {
                case 'header':
                    // Header Block Type
                    $levelSize = $item->data->level;
                    $levelText = $item->data->text;
                    $ret .= "<h{$levelSize}> $levelText </h{$levelSize}> ";
                break;
    
                case 'paragraph':
                    // Paragraph Block Type
                    $levelText = $item->data->text;
                    $ret .= "<p>".$levelText."</p>";
                break;
                case 'list':
                    // List Block Type
                    $levelStyle = $item->data->style === 'unordered' ? 'ul' : 'ol';
                    $levelArr = $item->data->items;
                    
                    $list = "<$levelStyle>";
                    $listItems = "";
                    foreach ($levelArr as $eleItem)
                    {
                        $listItems .= "<li> $eleItem </li>";
                    }
                    $list .= $listItems;
                    $list .= "</$levelStyle>";
    
                    $ret .= $list;
                break;
                case 'image':
                    // Image Block Type
                    $levelFilePath = $item->data->url;
                    $levelCaption = $item->data->caption;
    
                    $ret .= '<img style="max-width: 100%;vertical-align: bottom;display: block;" alt="' . $levelCaption . '" src="' . $levelFilePath . '"><center>' . $levelCaption . '</center>';
                break;
                case 'table':
                    // Table Block Type
                    $tableHtml = "<table>";
    
                    foreach ($item->data->content as $row)
                    {
                        $tableHtml .= "<tr>";
                        foreach ($row as $column){
                            $tableHtml .= "<td>$column</td>";
                        }
                        $tableHtml .= "</tr>";
                    }
                    $tableHtml .= "</table>";
    
                    $ret .= $tableHtml;
                    break;
                default:
                    // Unknown Block Type
                    throw new Exception("Unknown Block Type: '" . $item->type."'");
                }
    
        }
        return $ret;
    }
}
?>
