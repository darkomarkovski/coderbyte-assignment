<?php
const URL = 'https://api.lib.harvard.edu/v2/items.json';
const LIMIT = 10;

function getData(string $author, int $page): array
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, sprintf("%s?name=%s&start=%s&limit=%s", URL, $author, ($page-1)*LIMIT, LIMIT));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    return json_decode($response, true);
}

function buildPagination(int $page, int $numFound, string $author): string
{
    $html = "<div class='pagination'>";
    for ($i = 1; $i <= ceil($numFound / LIMIT); $i++) {
        $html .= sprintf(
            "<a class='%s' href='%s'>%s</a>",
            $page === $i ? "active" : "",
            "index.php?author={$author}&page={$i}",
            $i
        );
    }
    $html .= "</div>";

    return $html;
}

function buildListView(): string
{
    $data = getData($_GET['author'], isset($_GET['page']) ? (int)$_GET['page'] : 1);
//    echo "<pre>"; print_r($data);
    if (!isset($data['items'])) {
        return "No results found";
    }

    $table = '<div class="row">';

    foreach ($data['items']['mods'] as $item) {
        $table .= sprintf("<div class='column'>
            <h3>%s</h3>
            <p>%s</p>
        </div>",
            $item['titleInfo']['title'] ?? "",
            $item['titleInfo']['subTitle'] ?? "");
    }

    $table .= "</div>";

    $table .= buildPagination(isset($_GET['page']) ? (int)$_GET['page'] : 1, (int)$data['pagination']['numFound'], $_GET['author']);

    return $table;
}
