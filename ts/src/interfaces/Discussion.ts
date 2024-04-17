export default interface Discussion {
  title: string;
  author: string;
  content: string;
  likes: number;
  responses: number;
  waiting?: boolean;
}
