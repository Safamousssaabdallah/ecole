REM############################################################################
REM
REM Copyright (c) 2002, 2003, Oracle Corporation.  All rights reserved.  
REM
REM
REM PRODUCT
REM	Oracle Enterprise Manager
REM
REM THIS FILE IS MACHINE GENERATED. DO NOT EDIT!
REM
REM JOB TYPE SQL FOR JOB TYPE: Export
REM
REM#############################################################################

SET DEFINE OFF

SET SQLPREFIX OFF


BEGIN 
BEGIN
DECLARE
    l_job_type_name MGMT_JOB_TYPE_INFO.job_type%TYPE;
    l_job_type_id MGMT_JOB_TYPE_INFO.job_type_id%TYPE;
    l_major_version MGMT_JOB_TYPE_INFO.major_version%TYPE;
    l_minor_version1 MGMT_JOB_TYPE_INFO.minor_version1%TYPE;
    l_minor_version2 MGMT_JOB_TYPE_INFO.minor_version2%TYPE;
BEGIN

l_job_type_name:= 'Export';

BEGIN 
MGMT_JOB_ENGINE.fix_flatten_steps(TRUE); 
MGMT_JOB_ENGINE.get_max_versions(l_job_type_name, l_major_version,
                   l_minor_version1, l_minor_version2, 
                   l_job_type_id); 
                         
l_minor_version2 := l_minor_version2+1; 
     
EXCEPTION 
    WHEN OTHERS THEN 
        IF SQLCODE=MGMT_GLOBAL.INVALID_JOB_TYPE_ERR THEN             l_major_version := 1; 
            l_minor_version1 := 0; 
            l_minor_version2 := 1; 
        ELSE 
            RAISE;
        END IF; 
END; 

-- CHECK TO VALIDATE REFERENCED COMMANDS/NESTED JOB TYPES
BEGIN
DECLARE
    l_commands SMP_EMD_STRING_ARRAY := SMP_EMD_STRING_ARRAY();
    l_nested_jobtypes SMP_EMD_STRING_ARRAY := SMP_EMD_STRING_ARRAY();
BEGIN

    l_commands.trim(l_commands.count);

    l_commands.extend(1);
    l_commands(1) := 'remoteOp';
    MGMT_JOB_ENGINE.validate_job_type(l_job_type_name, l_commands, l_nested_jobtypes );


END;
END;


-- JOBTYPE ENTRY
INSERT INTO MGMT_JOB_TYPE_INFO(job_type, version, major_version, minor_version1, minor_version2, job_type_category, all_target_types, agent_bound, single_target, suspend_on_nocreds, default_target_type, restartable, editable, suspendable, trusted,job_type_nlsid,job_type_default,create_text_nlsid,create_text_default,delete_text_nlsid,delete_text_default)  VALUES
	( l_job_type_name, '1.0', l_major_version, l_minor_version1, l_minor_version2, 0, 0, 0, 0, 0, null, 1, 0, 0, -1, null, null, null, null, null, null)
RETURNING job_type_id INTO l_job_type_id;

-- PARAMINFO ENTRIES FOR STEP main
-- PARAM SOURCE: source type user
BEGIN
DECLARE
    l_param_names MGMT_JOB_VECTOR_PARAMS := MGMT_JOB_VECTOR_PARAMS();
BEGIN

    l_param_names.trim(l_param_names.count);

    l_param_names.extend(9);
    l_param_names(1) := 'export_script';
    l_param_names(2) := 'host_username';
    l_param_names(3) := 'host_password';
    l_param_names(4) := 'db_username';
    l_param_names(5) := 'db_password';
    l_param_names(6) := 'is_rac';
    l_param_names(7) := 'db_role_suffix';
    l_param_names(8) := 'db_10_or_higher';
    l_param_names(9) := 'job_name';
    INSERT INTO MGMT_JOB_PARAM_SOURCE(job_type_id, 
                          apply_at_submission, 
                          apply_on_retry, 
                          step_name, 
                          step_type, 
                          source_type, 
                          source_index, 
                          source_data, 
                          override_user, 
                          required, 
                          encrypted, 
                          parameter_names)  VALUES
	( l_job_type_id, 1, 0, 'main', 6, 'user', 1, null, 0, 1, 0, l_param_names );


END;
END;


-- PARAM SOURCE: source type user
BEGIN
DECLARE
    l_param_names MGMT_JOB_VECTOR_PARAMS := MGMT_JOB_VECTOR_PARAMS();
BEGIN

    l_param_names.trim(l_param_names.count);

    l_param_names.extend(2);
    l_param_names(1) := 'host_password';
    l_param_names(2) := 'db_password';
    INSERT INTO MGMT_JOB_PARAM_SOURCE(job_type_id, 
                          apply_at_submission, 
                          apply_on_retry, 
                          step_name, 
                          step_type, 
                          source_type, 
                          source_index, 
                          source_data, 
                          override_user, 
                          required, 
                          encrypted, 
                          parameter_names)  VALUES
	( l_job_type_id, 1, 0, 'main', 6, 'user', 2, null, 0, 0, 1, l_param_names );


END;
END;


-- ENTRIES FOR STEPSET main
INSERT INTO mgmt_job_execplan(job_type_id, step_name, step_type, nested_job_type, nested_job_target_type, incoming_edge_type, origin_step_name, origin_step_type, switch_var_name, switch_var_index, switch_case_val, iterate_param, iterate_param_filter, num_children, stepset_name, stepset_status, command_name, restart_mode, all_params, all_targets, halt_on_failure,step_nlsid ,step_default,trusted)  VALUES
	( l_job_type_id, 'main', 6, null, null, -1, null, -1, null, null, null, 'job_target_names', null, 1, null, null, null, 1, 0, 0, 0, null, null, -1 );

INSERT INTO mgmt_job_execplan(job_type_id, step_name, step_type, nested_job_type, nested_job_target_type, incoming_edge_type, origin_step_name, origin_step_type, switch_var_name, switch_var_index, switch_case_val, iterate_param, iterate_param_filter, num_children, stepset_name, stepset_status, command_name, restart_mode, all_params, all_targets, halt_on_failure,step_nlsid ,step_default,trusted)  VALUES
	( l_job_type_id, 'main', 2, null, null, 6, 'main', 6, null, null, null, 'job_target_names', null, 1, 'main', 'ExportStep', null, 1, 0, 0, 0, null, null, -1 );

-- ENTRIES FOR STEP ExportStep
INSERT INTO mgmt_job_execplan(job_type_id, step_name, step_type, nested_job_type, nested_job_target_type, incoming_edge_type, origin_step_name, origin_step_type, switch_var_name, switch_var_index, switch_case_val, iterate_param, iterate_param_filter, num_children, stepset_name, stepset_status, command_name, restart_mode, all_params, all_targets, halt_on_failure,step_nlsid ,step_default,trusted)  VALUES
	( l_job_type_id, 'ExportStep', 1, null, null, 1, 'main', 2, null, null, null, null, null, 0, 'main', null, 'remoteOp', 1, 0, 0, 0, null, null, -1 );

--  STEP PARAMETERS FOR STEP ExportStep
BEGIN
DECLARE
    l_vector_values MGMT_JOB_VECTOR_PARAMS := MGMT_JOB_VECTOR_PARAMS();
BEGIN
    INSERT INTO MGMT_JOB_STEP_PARAMS(job_type_id, step_name, param_name, parameter_type, encrypted, scalar_value, vector_value, value_of) VALUES
	( l_job_type_id, 'ExportStep', 'remoteCommand', 1, 0, '%perlbin%/perl', null, null );

    INSERT INTO MGMT_JOB_STEP_PARAMS(job_type_id, step_name, param_name, parameter_type, encrypted, scalar_value, vector_value, value_of) VALUES
	( l_job_type_id, 'ExportStep', 'input', 1, 0, '
              
                require "$ENV{EMDROOT}/sysman/admin/scripts/db/dataUtilities/export.pl";
                %export_script%
                my $l_db_username = q''%db_username%'';
                my $l_db_password = q''%db_password%'';
                my $l_db_role_suffix = q''%db_role_suffix%'';
                my $l_db_10_or_higher = q''%db_10_or_higher%'';
                my $l_job_name = q''%job_name%'';
              
          ', null, null );

    INSERT INTO MGMT_JOB_STEP_PARAMS(job_type_id, step_name, param_name, parameter_type, encrypted, scalar_value, vector_value, value_of) VALUES
	( l_job_type_id, 'ExportStep', 'largeInputParam', 1, 0, 'repeat_job', null, null );

    INSERT INTO MGMT_JOB_STEP_PARAMS(job_type_id, step_name, param_name, parameter_type, encrypted, scalar_value, vector_value, value_of) VALUES
	( l_job_type_id, 'ExportStep', 'targetName', 1, 0, '%job_target_names%[%job_iterate_index%]', null, null );

    INSERT INTO MGMT_JOB_STEP_PARAMS(job_type_id, step_name, param_name, parameter_type, encrypted, scalar_value, vector_value, value_of) VALUES
	( l_job_type_id, 'ExportStep', 'targetType', 1, 0, '%job_target_types%[%job_iterate_index%]', null, null );

    INSERT INTO MGMT_JOB_STEP_PARAMS(job_type_id, step_name, param_name, parameter_type, encrypted, scalar_value, vector_value, value_of) VALUES
	( l_job_type_id, 'ExportStep', 'username', 1, 0, '%host_username%', null, null );

    INSERT INTO MGMT_JOB_STEP_PARAMS(job_type_id, step_name, param_name, parameter_type, encrypted, scalar_value, vector_value, value_of) VALUES
	( l_job_type_id, 'ExportStep', 'password', 1, 0, '%host_password%', null, null );

    INSERT INTO MGMT_JOB_STEP_PARAMS(job_type_id, step_name, param_name, parameter_type, encrypted, scalar_value, vector_value, value_of) VALUES
	( l_job_type_id, 'ExportStep', 'executeSynchronous', 1, 0, 'false', null, null );


END;
END;


-- PARAMETERDISPLAYINFO ENTRIES 
INSERT INTO  MGMT_JOB_TYPE_PARAM_DSPLY_INFO (job_type_id   , parameter_name ,show_in_create ,    show_in_results ,label_nlsid ,    label_default , hint_nlsid  ,    hint_default ,    display_mode ,    num_lines ,    default_text , default_nlsid , param_order)  VALUES
	( l_job_type_id, 'host_username', 0, 1, null, null, null, null, 3, null, null, null, -1 );

-- PARAMETERDISPLAYINFO ENTRIES 
INSERT INTO  MGMT_JOB_TYPE_PARAM_DSPLY_INFO (job_type_id   , parameter_name ,show_in_create ,    show_in_results ,label_nlsid ,    label_default , hint_nlsid  ,    hint_default ,    display_mode ,    num_lines ,    default_text , default_nlsid , param_order)  VALUES
	( l_job_type_id, 'db_username', 0, 1, null, null, null, null, 3, null, null, null, -1 );

-- DISPLAYINFO ENTRIES
INSERT INTO MGMT_JOB_TYPE_DISPLAY_INFO(job_type_id, nls_bundle,use_default_create_ui)  VALUES
	( l_job_type_id, 'oracle.sysman.db.rsc.impexp.MonitorMsg', 0 );

INSERT INTO MGMT_JOB_TYPE_URI_INFO(job_type_id, uri_use, uri, is_jsp, class)  VALUES
	( l_job_type_id, 2, '/database/data/monitorInclude.jsp', 1, 'oracle.sysman.db.util.data.MonitorData' );

-- Ensure that all existing scheduled executions use the new jobtype version
MGMT_JOB_ENGINE.reschedule_on_new_jobtype_ver(l_job_type_id);
-- Patch NLS information for backward-compatibility
MGMT_JOB_ENGINE.update_job_type_nls_info(l_job_type_id, l_job_type_name);

END;
END;


MGMT_JOB_ENGINE.fix_flatten_steps(FALSE); 
EXCEPTION 
    WHEN OTHERS THEN 
        MGMT_JOB_ENGINE.fix_flatten_steps(FALSE); 
        RAISE; 
END; 
/
COMMIT;
SET DEFINE ON

SET SQLPREFIX ON

