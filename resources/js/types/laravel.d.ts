namespace App {
    /**
     * Represents a link in a paginator.
     * Each link has a URL, label, and an active state.
     */
    export interface PaginatorLink {
        url: string | null;
        label: string;
        active: boolean;
    }

    /**
     * Represents a paginated response.
     * It contains the current page, data items, and pagination links.
     */
    export interface Paginator<T = unknown> {
        current_page: number;
        data: T[];
        first_page_url: string;
        from: number | null;
        last_page: number;
        last_page_url: string;
        links: PaginatorLink[];
        next_page_url: string | null;
        path: string;
        per_page: number;
        prev_page_url: string | null;
        to: number | null;
        total: number;
    }

    export type EnumCollection = Array<{
        value: string;
        label: string;
        description?: string;
        color?: string;
        lucideIcon?: string;
    }>;

    export type PluckedEnum<K extends string | number = string> = Record<
        K,
        string
    >;
}
