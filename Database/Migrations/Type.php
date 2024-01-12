<?php

namespace Database\Migrations;

enum Type: string
{
    case PRIMARY = "PRIMARY KEY";
    case TEXT = "text";
    case INT = "int";
    case STRING = "varchar(20)";
    case DATE = "date";
    case FLOAT = "float";
    case FORIGNID = "";
}
