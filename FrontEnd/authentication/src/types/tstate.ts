
export interface State {
    token: string | null;
    is_authenticated: boolean;
    sesionExp: boolean;
    user: string | null;
    permissions: string[];
  }