
# SQL converter

An easy to use user friendly SQL converter.\
It helps to convert for example CSV files to SQL commands.


## Features

- Convert CSV or any UTF-8 text file to SQL commands 
- Modern design
- Open source
- Lightweight code
- Custom table names
- Custom seperators
- Generate primary key
- Make the first column as primary keys


## Installation

Just clone this repository, and paste the files into your server folder.

    
## Demo

[sql.kosamate.hu](https://sql.kosamate.hu)


## API Reference

#### Convert file with settings

```http
  POST /converter.php
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `csv_file`      | `file` | **Required**. The (csv) file to be converted |
| `table_name`      | `string` | **Required**. The name of the table |
| `radio`      | `string` | **Required**. The delimiter character |
| `first_row_header`      | `string` | If we want the first row to be the table header, it must be set to "on". |
| `first_column_pk`      | `string` | If we want the first column to be the primary key, it must be set to "on".  |
| `generate_pk`      | `string` | If we want to generate primary key for each row. |



