<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2019 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
declare(strict_types=1);

namespace Fisharebest\Webtrees;

use Fisharebest\Webtrees\Http\RequestHandlers\DeleteUser;
use Fisharebest\Webtrees\Http\RequestHandlers\MasqueradeAsUser;
use Fisharebest\Webtrees\Http\RequestHandlers\ModuleAction;
use Fisharebest\Webtrees\Http\RequestHandlers\Ping;
use Fisharebest\Webtrees\Http\RequestHandlers\PrivacyPolicy;
use Fisharebest\Webtrees\Http\RequestHandlers\SelectLanguage;
use Fisharebest\Webtrees\Http\RequestHandlers\SelectTheme;

/** @var Tree|null $tree */
$tree = app(Tree::class);

$routes = [];

// Admin routes.
if (Auth::isAdmin()) {
    $routes += [
        'GET:admin-control-panel'             => 'Admin\\ControlPanelController@controlPanel',
        'GET:analytics-edit'                  => 'Admin\\AnalyticsController@edit',
        'POST:analytics-edit'                 => 'Admin\\AnalyticsController@save',
        'GET:admin-fix-level-0-media'         => 'Admin\\FixLevel0MediaController@fixLevel0Media',
        'POST:admin-fix-level-0-media-action' => 'Admin\\FixLevel0MediaController@fixLevel0MediaAction',
        'GET:admin-fix-level-0-media-data'    => 'Admin\\FixLevel0MediaController@fixLevel0MediaData',
        'GET:admin-webtrees1-thumbs'          => 'Admin\\ImportThumbnailsController@webtrees1Thumbnails',
        'POST:admin-webtrees1-thumbs-action'  => 'Admin\\ImportThumbnailsController@webtrees1ThumbnailsAction',
        'GET:admin-webtrees1-thumbs-data'     => 'Admin\\ImportThumbnailsController@webtrees1ThumbnailsData',
        'GET:modules'                         => 'Admin\\ModuleController@list',
        'POST:modules'                        => 'Admin\\ModuleController@update',
        'GET:analytics'                       => 'Admin\\ModuleController@listAnalytics',
        'POST:analytics'                      => 'Admin\\ModuleController@updateAnalytics',
        'GET:blocks'                          => 'Admin\\ModuleController@listBlocks',
        'POST:blocks'                         => 'Admin\\ModuleController@updateBlocks',
        'GET:charts'                          => 'Admin\\ModuleController@listCharts',
        'POST:charts'                         => 'Admin\\ModuleController@updateCharts',
        'GET:lists'                           => 'Admin\\ModuleController@listLists',
        'POST:lists'                          => 'Admin\\ModuleController@updateLists',
        'GET:footers'                         => 'Admin\\ModuleController@listFooters',
        'POST:footers'                        => 'Admin\\ModuleController@updateFooters',
        'GET:history'                         => 'Admin\\ModuleController@listHistory',
        'POST:history'                        => 'Admin\\ModuleController@updateHistory',
        'GET:menus'                           => 'Admin\\ModuleController@listMenus',
        'POST:menus'                          => 'Admin\\ModuleController@updateMenus',
        'GET:languages'                       => 'Admin\\ModuleController@listLanguages',
        'POST:languages'                      => 'Admin\\ModuleController@updateLanguages',
        'GET:reports'                         => 'Admin\\ModuleController@listReports',
        'POST:reports'                        => 'Admin\\ModuleController@updateReports',
        'GET:sidebars'                        => 'Admin\\ModuleController@listSidebars',
        'POST:sidebars'                       => 'Admin\\ModuleController@updateSidebars',
        'GET:themes'                          => 'Admin\\ModuleController@listThemes',
        'POST:themes'                         => 'Admin\\ModuleController@updateThemes',
        'GET:tabs'                            => 'Admin\\ModuleController@listTabs',
        'POST:tabs'                           => 'Admin\\ModuleController@updateTabs',
        'POST:delete-module-settings'         => 'Admin\\ModuleController@deleteModuleSettings',
        'GET:map-data'                        => 'Admin\\LocationController@mapData',
        'GET:map-data-edit'                   => 'Admin\\LocationController@mapDataEdit',
        'POST:map-data-edit'                  => 'Admin\\LocationController@mapDataSave',
        'POST:map-data-delete'                => 'Admin\\LocationController@mapDataDelete',
        'GET:locations-export'                => 'Admin\\LocationController@exportLocations',
        'GET:locations-import'                => 'Admin\\LocationController@importLocations',
        'POST:locations-import'               => 'Admin\\LocationController@importLocationsAction',
        'POST:locations-import-from-tree'     => 'Admin\\LocationController@importLocationsFromTree',
        'GET:map-provider'                    => 'Admin\\MapProviderController@mapProviderEdit',
        'POST:map-provider'                   => 'Admin\\MapProviderController@mapProviderSave',
        'GET:admin-media'                     => 'Admin\\MediaController@index',
        'GET:admin-media-data'                => 'Admin\\MediaController@data',
        'POST:admin-media-delete'             => 'Admin\\MediaController@delete',
        'GET:admin-media-upload'              => 'Admin\\MediaController@upload',
        'POST:admin-media-upload'             => 'Admin\\MediaController@uploadAction',
        'GET:upgrade'                         => 'Admin\\UpgradeController@wizard',
        'POST:upgrade'                        => 'Admin\\UpgradeController@step',
        'GET:admin-users'                     => 'Admin\\UsersController@index',
        'GET:admin-users-data'                => 'Admin\\UsersController@data',
        'GET:admin-users-create'              => 'Admin\\UsersController@create',
        'POST:admin-users-create'             => 'Admin\\UsersController@save',
        'GET:admin-users-edit'                => 'Admin\\UsersController@edit',
        'POST:admin-users-edit'               => 'Admin\\UsersController@update',
        'GET:admin-users-cleanup'             => 'Admin\\UsersController@cleanup',
        'POST:admin-users-cleanup'            => 'Admin\\UsersController@cleanupAction',
        'GET:admin-clean-data'                => 'AdminSiteController@cleanData',
        'POST:admin-clean-data'               => 'AdminSiteController@cleanDataAction',
        'GET:admin-site-preferences'          => 'AdminSiteController@preferencesForm',
        'POST:admin-site-preferences'         => 'AdminSiteController@preferencesSave',
        'GET:admin-site-mail'                 => 'AdminSiteController@mailForm',
        'POST:admin-site-mail'                => 'AdminSiteController@mailSave',
        'GET:admin-site-registration'         => 'AdminSiteController@registrationForm',
        'POST:admin-site-registration'        => 'AdminSiteController@registrationSave',
        'GET:admin-site-logs'                 => 'AdminSiteController@logs',
        'GET:admin-site-logs-data'            => 'AdminSiteController@logsData',
        'POST:admin-site-logs-delete'         => 'AdminSiteController@logsDelete',
        'GET:admin-site-logs-export'          => 'AdminSiteController@logsExport',
        'GET:admin-site-information'          => 'AdminSiteController@serverInformation',
        'POST:admin-trees-create'             => 'AdminTreesController@create',
        'POST:admin-trees-default'            => 'AdminTreesController@setDefault',
        'POST:admin-trees-delete'             => 'AdminTreesController@delete',
        'POST:admin-trees-sync'               => 'AdminTreesController@synchronize',
        'GET:admin-trees-merge'               => 'AdminTreesController@merge',
        'POST:admin-trees-merge'              => 'AdminTreesController@mergeAction',
        'GET:user-page-default-edit'          => 'HomePageController@userPageDefaultEdit',
        'POST:user-page-default-update'       => 'HomePageController@userPageDefaultUpdate',
        'GET:user-page-user-edit'             => 'HomePageController@userPageUserEdit',
        'POST:user-page-user-update'          => 'HomePageController@userPageUserUpdate',
        'GET:unused-media-thumbnail'          => 'MediaFileController@unusedMediaThumbnail',
        'GET:broadcast'                       => 'MessageController@broadcastPage',
        'POST:broadcast'                      => 'MessageController@broadcastAction',
        'POST:delete-user'                    => DeleteUser::class,
        'POST:masquerade'                     => MasqueradeAsUser::class,
    ];
}

// Manager routes.
if ($tree instanceof Tree && Auth::isManager($tree)) {
    $routes += [
        'GET:admin-control-panel-manager' => 'Admin\\ControlPanelController@controlPanelManager',
        'GET:admin-changes-log'           => 'Admin\\ChangesLogController@changesLog',
        'GET:admin-changes-log-data'      => 'Admin\\ChangesLogController@changesLogData',
        'GET:admin-changes-log-download'  => 'Admin\\ChangesLogController@changesLogDownload',
        'GET:admin-trees'                 => 'AdminTreesController@index',
        'GET:admin-trees-check'           => 'AdminTreesController@check',
        'GET:admin-trees-duplicates'      => 'AdminTreesController@duplicates',
        'GET:admin-trees-export'          => 'AdminTreesController@export',
        'GET:admin-trees-download'        => 'AdminTreesController@exportClient',
        'POST:admin-trees-export'         => 'AdminTreesController@exportServer',
        'GET:admin-trees-import'          => 'AdminTreesController@importForm',
        'POST:admin-trees-import'         => 'AdminTreesController@importAction',
        'GET:admin-trees-places'          => 'AdminTreesController@places',
        'POST:admin-trees-places'         => 'AdminTreesController@placesAction',
        'GET:admin-trees-preferences'     => 'AdminTreesController@preferences',
        'POST:admin-trees-preferences'    => 'AdminTreesController@preferencesUpdate',
        'GET:admin-trees-renumber'        => 'AdminTreesController@renumber',
        'POST:admin-trees-renumber'       => 'AdminTreesController@renumberAction',
        'GET:admin-trees-unconnected'     => 'AdminTreesController@unconnected',
        'GET:tree-page-default-edit'      => 'HomePageController@treePageDefaultEdit',
        'POST:tree-page-default-update'   => 'HomePageController@treePageDefaultUpdate',
        'GET:tree-page-edit'              => 'HomePageController@treePageEdit',
        'POST:import'                     => 'GedcomFileController@import',
        'POST:tree-page-update'           => 'HomePageController@treePageUpdate',
        'GET:merge-records'               => 'AdminController@mergeRecords',
        'POST:merge-records'              => 'AdminController@mergeRecordsAction',
        'GET:tree-page-block-edit'        => 'HomePageController@treePageBlockEdit',
        'POST:tree-page-block-edit'       => 'HomePageController@treePageBlockUpdate',
        'GET:tree-preferences'            => 'AdminController@treePreferencesEdit',
        'POST:tree-preferences'           => 'AdminController@treePreferencesUpdate',
        'GET:tree-privacy'                => 'AdminController@treePrivacyEdit',
        'POST:tree-privacy'               => 'AdminController@treePrivacyUpdate',
    ];
}

// Moderator routes.
if ($tree instanceof Tree && $tree->getPreference('imported') === '1' && Auth::isModerator($tree)) {
    $routes += [
        'GET:show-pending'        => 'PendingChangesController@showChanges',
        'POST:accept-pending'     => 'PendingChangesController@acceptChange',
        'POST:reject-pending'     => 'PendingChangesController@rejectChange',
        'POST:accept-all-pending' => 'PendingChangesController@acceptAllChanges',
        'POST:reject-all-pending' => 'PendingChangesController@rejectAllChanges',
    ];
}

// Editor routes.
if ($tree instanceof Tree && $tree->getPreference('imported') === '1' && Auth::isEditor($tree)) {
    $routes += [
        'GET:add-media-file'             => 'EditMediaController@addMediaFile',
        'POST:add-media-file'            => 'EditMediaController@addMediaFileAction',
        'GET:edit-media-file'            => 'EditMediaController@editMediaFile',
        'POST:edit-media-file'           => 'EditMediaController@editMediaFileAction',
        'GET:create-media-object'        => 'EditMediaController@createMediaObject',
        'POST:create-media-object'       => 'EditMediaController@createMediaObjectAction',
        'POST:create-media-from-file'    => 'EditMediaController@createMediaObjectFromFileAction',
        'GET:link-media-to-individual'   => 'EditMediaController@linkMediaToIndividual',
        'GET:link-media-to-family'       => 'EditMediaController@linkMediaToFamily',
        'GET:link-media-to-source'       => 'EditMediaController@linkMediaToSource',
        'POST:link-media-to-record'      => 'EditMediaController@linkMediaToRecordAction',
        'GET:create-note-object'         => 'EditNoteController@createNoteObject',
        'POST:create-note-object'        => 'EditNoteController@createNoteObjectAction',
        'GET:edit-note-object'           => 'EditNoteController@editNoteObject',
        'POST:edit-note-object'          => 'EditNoteController@updateNoteObject',
        'GET:create-repository'          => 'EditRepositoryController@createRepository',
        'POST:create-repository'         => 'EditRepositoryController@createRepositoryAction',
        'GET:create-source'              => 'EditSourceController@createSource',
        'POST:create-source'             => 'EditSourceController@createSourceAction',
        'GET:create-submitter'           => 'EditSubmitterController@createSubmitter',
        'POST:create-submitter'          => 'EditSubmitterController@createSubmitterAction',
        'GET:reorder-children'           => 'EditFamilyController@reorderChildren',
        'POST:reorder-children'          => 'EditFamilyController@reorderChildrenAction',
        'GET:reorder-media'              => 'EditIndividualController@reorderMedia',
        'POST:reorder-media'             => 'EditIndividualController@reorderMediaAction',
        'GET:reorder-names'              => 'EditIndividualController@reorderNames',
        'POST:reorder-names'             => 'EditIndividualController@reorderNamesAction',
        'GET:reorder-spouses'            => 'EditIndividualController@reorderSpouses',
        'POST:reorder-spouses'           => 'EditIndividualController@reorderSpousesAction',
        'GET:edit-raw-record'            => 'EditGedcomRecordController@editRawRecord',
        'POST:edit-raw-record'           => 'EditGedcomRecordController@editRawRecordAction',
        'GET:edit-raw-fact'              => 'EditGedcomRecordController@editRawFact',
        'POST:edit-raw-fact'             => 'EditGedcomRecordController@editRawFactAction',
        'POST:copy-fact'                 => 'EditGedcomRecordController@copyFact',
        'POST:delete-fact'               => 'EditGedcomRecordController@deleteFact',
        'POST:paste-fact'                => 'EditGedcomRecordController@pasteFact',
        'POST:delete-record'             => 'EditGedcomRecordController@deleteRecord',
        'GET:add-fact'                   => 'EditGedcomRecordController@addFact',
        'GET:edit-fact'                  => 'EditGedcomRecordController@editFact',
        'POST:update-fact'               => 'EditGedcomRecordController@updateFact',
        'GET:search-replace'             => 'SearchController@replace',
        'POST:search-replace'            => 'SearchController@replaceAction',
        'GET:add-child-to-family'        => 'EditFamilyController@addChild',
        'POST:add-child-to-family'       => 'EditFamilyController@addChildAction',
        'GET:add-spouse-to-family'       => 'EditFamilyController@addSpouse',
        'POST:add-spouse-to-family'      => 'EditFamilyController@addSpouseAction',
        'GET:change-family-members'      => 'EditFamilyController@changeFamilyMembers',
        'POST:change-family-members'     => 'EditFamilyController@changeFamilyMembersAction',
        'GET:add-child-to-individual'    => 'EditIndividualController@addChild',
        'POST:add-child-to-individual'   => 'EditIndividualController@addChildAction',
        'GET:add-parent-to-individual'   => 'EditIndividualController@addParent',
        'POST:add-parent-to-individual'  => 'EditIndividualController@addParentAction',
        'GET:add-spouse-to-individual'   => 'EditIndividualController@addSpouse',
        'POST:add-spouse-to-individual'  => 'EditIndividualController@addSpouseAction',
        'GET:add-unlinked-individual'    => 'EditIndividualController@addUnlinked',
        'POST:add-unlinked-individual'   => 'EditIndividualController@addUnlinkedAction',
        'GET:link-child-to-family'       => 'EditIndividualController@linkChildToFamily',
        'POST:link-child-to-family'      => 'EditIndividualController@linkChildToFamilyAction',
        'GET:link-spouse-to-individual'  => 'EditIndividualController@linkSpouseToIndividual',
        'POST:link-spouse-to-individual' => 'EditIndividualController@linkSpouseToIndividualAction',
        'GET:edit-name'                  => 'EditIndividualController@editName',
        'POST:edit-name'                 => 'EditIndividualController@editNameAction',
        'GET:add-name'                   => 'EditIndividualController@addName',
        'POST:add-name'                  => 'EditIndividualController@addNameAction',
    ];
}

// Member routes.
if ($tree instanceof Tree && $tree->getPreference('imported') === '1' && Auth::isMember($tree)) {
    $routes += [
        'GET:user-page'             => 'HomePageController@userPage',
        'GET:user-page-block'       => 'HomePageController@userPageBlock',
        'GET:user-page-edit'        => 'HomePageController@userPageEdit',
        'POST:user-page-update'     => 'HomePageController@userPageUpdate',
        'GET:user-page-block-edit'  => 'HomePageController@userPageBlockEdit',
        'POST:user-page-block-edit' => 'HomePageController@userPageBlockUpdate',
        'GET:my-account'            => 'AccountController@edit',
        'POST:my-account'           => 'AccountController@update',
        'POST:delete-account'       => 'AccountController@delete',
    ];
}

// Public routes (that need a tree).
if ($tree instanceof Tree && $tree->getPreference('imported') === '1') {
    $routes += [
        'GET:autocomplete-folder' => 'AutocompleteController@folder',
        'GET:autocomplete-page'   => 'AutocompleteController@page',
        'GET:autocomplete-place'  => 'AutocompleteController@place',
        'GET:calendar'            => 'CalendarController@page',
        'GET:calendar-events'     => 'CalendarController@calendar',
        'GET:help-text'           => 'HelpTextController@helpText',
        'GET:tree-page'           => 'HomePageController@treePage',
        'GET:tree-page-block'     => 'HomePageController@treePageBlock',
        'GET:media-thumbnail'     => 'MediaFileController@mediaThumbnail',
        'GET:media-download'      => 'MediaFileController@mediaDownload',
        'GET:family'              => 'FamilyController@show',
        'GET:individual'          => 'IndividualController@show',
        'GET:individual-tab'      => 'IndividualController@tab',
        'GET:media'               => 'MediaController@show',
        'GET:contact'             => 'MessageController@contactPage',
        'POST:contact'            => 'MessageController@contactAction',
        'GET:message'             => 'MessageController@messagePage',
        'POST:message'            => 'MessageController@messageAction',
        'GET:note'                => 'NoteController@show',
        'GET:source'              => 'SourceController@show',
        'GET:record'              => 'GedcomRecordController@show',
        'GET:repository'          => 'RepositoryController@show',
        'GET:report-list'         => 'ReportEngineController@reportList',
        'GET:report-setup'        => 'ReportEngineController@reportSetup',
        'GET:report-run'          => 'ReportEngineController@reportRun',
        'POST:accept-changes'     => 'PendingChangesController@acceptChanges',
        'POST:reject-changes'     => 'PendingChangesController@rejectChanges',
        'POST:accept-all-changes' => 'PendingChangesController@acceptAllChanges',
        'POST:reject-all-changes' => 'PendingChangesController@rejectAllChanges',
        'POST:select2-family'     => 'AutocompleteController@select2Family',
        'POST:select2-individual' => 'AutocompleteController@select2Individual',
        'POST:select2-media'      => 'AutocompleteController@select2MediaObject',
        'POST:select2-note'       => 'AutocompleteController@select2Note',
        'POST:select2-source'     => 'AutocompleteController@select2Source',
        'POST:select2-submitter'  => 'AutocompleteController@select2Submitter',
        'POST:select2-repository' => 'AutocompleteController@select2Repository',
        'GET:search-quick'        => 'SearchController@quick',
        'GET:search-advanced'     => 'SearchController@advanced',
        'GET:search-general'      => 'SearchController@general',
        'GET:search-phonetic'     => 'SearchController@phonetic',
    ];
}

// Public routes (that do not need a tree).
$routes += [
    'GET:login'            => 'Auth\\LoginController@loginPage',
    'POST:login'           => 'Auth\\LoginController@loginAction',
    'GET:logout'           => 'Auth\\LoginController@logoutAction',
    'POST:logout'          => 'Auth\\LoginController@logoutAction',
    'GET:register'         => 'Auth\\RegisterController@registerPage',
    'POST:register'        => 'Auth\\RegisterController@registerAction',
    'GET:verify'           => 'Auth\\VerifyEmailController@verify',
    'GET:forgot-password'  => 'Auth\\ForgotPasswordController@forgotPasswordPage',
    'POST:forgot-password' => 'Auth\\ForgotPasswordController@forgotPasswordAction',
    'POST:language'        => SelectLanguage::class,
    'POST:theme'           => SelectTheme::class,
    'GET:privacy-policy'   => PrivacyPolicy::class,
    'GET:module'           => ModuleAction::class,
    'POST:module'          => ModuleAction::class,
    'GET:ping'             => Ping::class,
];

return $routes;
