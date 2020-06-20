<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/LouisKlimek/EditorJS-Data-to-HTML-Converter-PHP">
    <img src="editorjsLogo.png" alt="EditorJS-Logo" width="80" height="80">
  </a>

  <h3 align="center">EditorJS Data to HTML Converter for PHP</h3>

  <p align="center">
    A PHP Class to convert EditorJS JSON Data to HTML.
    <br />
  </p>
</p>



<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
* [Getting Started](#getting-started)
* [Contributing](#contributing)
  * [ToDo](#todo)
* [License](#license)



<!-- ABOUT THE PROJECT -->
## About The Project

This is just a Simple PHP Class you can easily use to convert your EditorJS Output JSON Data to usable HTML.


<!-- GETTING STARTED -->
## Getting Started

To Convert the following JSON
```sh
{
  "time": 1592596921258,
  "blocks": [
    {
      "type": "header",
      "data": {
        "text": "Some Header",
        "level": 2
      }
    },
    {
      "type": "paragraph",
      "data": {
        "text": "Lorem Ipsum Text thingy Lorem Lorem Ipsum<br>"
      }
    },
    {
      "type": "list",
      "data": {
        "style": "ordered",
        "items": [
          "First List Item",
          "Second List Item",
          "Third List Item"
        ]
      }
    },
    {
      "type": "table",
      "data": {
        "content": [
          [
            "Table Value 1<br>",
            "Table Value 2<br>"
          ],
          [
            "Table Value 3<br>",
            "Table Value 4<br>"
          ]
        ]
      }
    }
  ],
  "version": "2.17.0"
}
```

To Following HTML
```sh
<h2> Some Header </h2>
<p>Lorem Ipsum Text thingy Lorem Lorem Ipsum<br></p>
<ol>
    <li> First List Item </li>
    <li> Second List Item </li>
    <li> Third List Item </li>
</ol>
<table>
    <tbody>
        <tr>
            <td>Table Value 1<br></td>
            <td>Table Value 2<br></td>
        </tr>
        <tr>
            <td>Table Value 3<br></td>
            <td>Table Value 4<br></td>
        </tr>
    </tbody>
</table>
```

You just need to call the Function in the "editorJSConverter.php" like so
```sh
include 'editorJSConverter.php';
$editorJSConverter = new editorJSConverter();

$jstring = '{"time":1592596921258,"blocks":[{"type":"header","data":{"text":"Some Header","level":2}},{"type":"paragraph","data":{"text":"Lorem Ipsum Text thingy Lorem Lorem Ipsum<br>"}},{"type":"list","data":{"style":"ordered","items":["First List Item","Second List Item","Third List Item"]}},{"type":"table","data":{"content":[["Table Value 1<br>","Table Value 2<br>"],["Table Value 3<br>","Table Value 4<br>"]]}}],"version":"2.17.0"}';

// Choose one of follwing Options
echo $editorJSConverter->jsonToHtml( $jstring ); // Normal HTML
echo htmlspecialchars($editorJSConverter->jsonToHtml( $jstring )); // HTML as Plain Text
```


<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- TODO -->
## ToDo

If you decide that you want to help out, here is a little List of things that need to be done.

1. Add delimiter Block Type
2. Add embed Block Type
3. Add Quote Block Type
4. Add Code Block Type
5. Add raw Block Type
6. Add warning Block Type



<!-- LICENSE -->
## License

Distributed under the Apache License 2.0. See `LICENSE` for more information.
