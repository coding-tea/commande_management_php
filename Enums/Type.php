<?php

enum Type: string
{
    case PRIMARY = "INT PRIMARY KEY";
    case TEXT = "text";
    case INT = "int";
    case STRING = "varchar(20)";
    case DATE = "date";
    case FLOAT = "float";
    case FORIGNCLIENT = "foreign key (client_id) references clients(id)";
    case FORIGNCOMM = "foreign key (commande_id) references commandes(id)";
    case FORIGNPROD = "foreign key (product_id) references products(id)";
}
