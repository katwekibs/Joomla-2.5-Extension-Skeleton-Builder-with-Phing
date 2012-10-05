<?php
defined('_JEXEC') or die;

function @@extensionname@@BuildRoute( &$query )
{
       $segments = array();
       if(isset($query['view']))
       {
                $segments[] = $query['view'];
                unset( $query['view'] );
       }
       if(isset($query['id']))
       {
                $segments[] = $query['id'];
                unset( $query['id'] );
       };
       return $segments;
}

function @@extensionname@@ParseRoute( $segments )
{
       $vars = array();
       switch($segments[0])
       {
               case 'categories':
                       $vars['view'] = 'categories';
                       break;
               case 'category':
                       $vars['view'] = 'category';
                       $id = explode( ':', $segments[1] );
                       $vars['id'] = (int) $id[0];
                       break;
               case 'article':
                       $vars['view'] = 'article';
                       $id = explode( ':', $segments[1] );
                       $vars['id'] = (int) $id[0];
                       break;
       }
       return $vars;
}