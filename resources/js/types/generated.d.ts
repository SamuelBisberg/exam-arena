declare namespace App.Enums {
    export type CourseActivityStatusEnum = 'active' | 'inactive' | 'draft';
    export type CourseLevelEnum =
        | 'bachelors'
        | 'advanced_bachelors'
        | 'masters';
    export type PermissionsEnum =
        | 'view_admin_panel'
        | 'manage_users'
        | 'edit_content'
        | 'moderate_comments'
        | 'impersonate_users'
        | 'view_hidden_content';
    export type RolesEnum = 'admin' | 'moderator' | 'user';
    export type SemesterEnum = 'Spring' | 'Summer' | 'Fall';
    export type SessionEnum = 'A' | 'B' | 'C' | 'SPECIAL';
    export type TopicStatusEnum = 'active' | 'inactive' | 'draft';
    export type VisibilityStatusEnum =
        | 'draft'
        | 'published'
        | 'archived'
        | 'unavailable';
}
declare namespace App.Models {
    export type Course = {
        id: number;
        title: string;
        description?: string | null;
        course_code?: string | null;
        level: App.Enums.CourseLevelEnum;
        activity_status: App.Enums.CourseActivityStatusEnum;
    };
    export type Exam = {
        id: number;
        course_id: number;
        questionnaire_identifier: string;
        session: App.Enums.SessionEnum;
        semester: App.Enums.SemesterEnum;
        year: number;
        yearAndSemester: string;
        exam_date: string;
        visibility_status: App.Enums.VisibilityStatusEnum;
        total_pages: number;
        total_questions: number;
        duration_minutes?: number | null;
        instructions?: string | null;
        created_at: string;
        updated_at?: string | null;
    };
    export type Topic = {
        id: number;
        name: string;
        description?: string | null;
        topic_status: App.Enums.TopicStatusEnum;
        course_id: number;
        order_column: number;
    };
    export type University = {
        id: number;
        name: string;
        short_name: string;
        slug: string;
        logo_path?: string | null;
        country?: string | null;
        website_url?: string | null;
        description?: string | null;
    };
    export type User = {
        id: number;
        name: string;
        email: string;
        email_verified_at?: string | null;
        created_at?: string | null;
        updated_at?: string | null;
    };
}
