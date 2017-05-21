# Fisheye_BlueFootList

A Magento 2 module to add a list 'page builder block' to the BlueFoot CMS & Page Builder system.

## Overview

This extension provides the ability to add one or more list items into a block within the BlueFoot CMS system.

## Features

### Page Builder Blocks

The following Page Builder Blocks are added by this extension:

* List - inserts a containing unordered (`<ul>`) list element where one or more list items (`<li>`) can be included
* List item - adds an `<li>` item to a parent list element (can only be used as a child of a 'list' block)

### Attributes

The following attributes added to facilitate the list builder functionality:

#### List

* List Title - `list_title` - *text*
* List Style - `list_style` - *select*
* List Items - `list_items` - *child_item*

#### List Item

* List Item Text - `list_item_text` - *text*
* List Item Icon - `list_item_icon` - *text*
* List Item Link URL - `list_item_url` - *text*
