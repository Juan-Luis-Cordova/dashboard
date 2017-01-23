<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This file keeps track of upgrades to the emarking module
* Sometimes, changes between versions involve alterations to database
* structures and other major things that may break installations.
* The upgrade
* function in this file will attempt to perform all the necessary actions to
* upgrade your older installation to the current version. If there's something
* it cannot do itself, it will tell you what you need to do. The commands in
* here will all be database-neutral, using the functions defined in DLL libraries.
*
* @package mod
* @subpackage emarking
* @copyright 2013-onwards Jorge Villalon <villalon@gmail.com>
* @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/
defined('MOODLE_INTERNAL') || die();
/**
 * Execute emarking upgrade from the given old version
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_emarking_upgrade($oldversion) {
	global $DB;
	// Loads ddl manager and xmldb classes.
	$dbman = $DB->get_manager();
	
	if ($oldversion < 2017012302) {
	
		// Define table dashboard_turnitin to be created.
		$table = new xmldb_table('dashboard_turnitin');
	
		// Adding fields to table dashboard_turnitin.
		$table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
		$table->add_field('time', XMLDB_TYPE_INTEGER, '20', null, null, null, null);
		$table->add_field('courseid', XMLDB_TYPE_INTEGER, '20', null, null, null, null);
		$table->add_field('amountcreated', XMLDB_TYPE_INTEGER, '20', null, null, null, null);
		$table->add_field('useramount', XMLDB_TYPE_INTEGER, '20', null, null, null, null);
	
		// Adding keys to table dashboard_turnitin.
		$table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
	
		// Conditionally launch create table for dashboard_turnitin.
		if (!$dbman->table_exists($table)) {
			$dbman->create_table($table);
		}
	
		// Dashboard savepoint reached.
		upgrade_plugin_savepoint(true, 2017012302, 'local', 'dashboard');
	}
	
	if ($oldversion < 2017012302) {
	
		// Define table dashboard_emarking to be created.
		$table = new xmldb_table('dashboard_emarking');
	
		// Adding fields to table dashboard_emarking.
		$table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
		$table->add_field('time', XMLDB_TYPE_INTEGER, '20', null, null, null, null);
		$table->add_field('courseid', XMLDB_TYPE_INTEGER, '20', null, null, null, null);
		$table->add_field('amountcreated', XMLDB_TYPE_INTEGER, '20', null, null, null, null);
		$table->add_field('digitalized', XMLDB_TYPE_INTEGER, '20', null, null, null, null);
		$table->add_field('corrections', XMLDB_TYPE_INTEGER, '20', null, null, null, null);
		$table->add_field('publish', XMLDB_TYPE_INTEGER, '20', null, null, null, null);
	
		// Adding keys to table dashboard_emarking.
		$table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
	
		// Conditionally launch create table for dashboard_emarking.
		if (!$dbman->table_exists($table)) {
			$dbman->create_table($table);
		}
	
		// Dashboard savepoint reached.
		upgrade_plugin_savepoint(true, 2017012302, 'local', 'dashboard');
	}
	
	
	return true;
	}